<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Transaction;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showDepositForm()
    {
        $user = Auth::user();

        return view('payment.deposit', compact('user'));
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:10000',
        ]);

        $vnpTmnCode = env('VNPAY_TMN_CODE');
        $vnpHashSecret = env('VNPAY_HASH_SECRET');
        $vnpUrl = env('VNPAY_URL');

        $vnpParams = [
            'vnp_TmnCode' => $vnpTmnCode,
            'vnp_Amount' => $request->amount * 100,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $request->ip(),
            'vnp_Locale' => 'vn',
            'vnp_OrderInfo' => 'Nạp tiền vào tài khoản',
            'vnp_OrderType' => 'billpayment',
            'vnp_ReturnUrl' => route('payment.callback'),
            'vnp_TxnRef' => time(),
            'vnp_Version' => '2.1.0',
        ];

        ksort($vnpParams);

        $query = '';
        $i = 0;
        $hashdata = '';

        foreach ($vnpParams as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnpHashSecret);
        $vnpUrl = $vnpUrl . '?' . $query . 'vnp_SecureHash=' . $vnpSecureHash;

        return redirect()->away($vnpUrl);
    }

    public function depositCallback(Request $request)
    {
        $vnpHashSecret = env('VNPAY_HASH_SECRET');
        $vnpParams = $request->all();

        $vnpSecureHash = $vnpParams['vnp_SecureHash'] ?? '';
        unset($vnpParams['vnp_SecureHash']);
        unset($vnpParams['vnp_SecureHashType']);

        ksort($vnpParams);

        $hashdata = '';
        $i = 0;

        foreach ($vnpParams as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashdata, $vnpHashSecret);

        $result = [];

        if ($secureHash === $vnpSecureHash) {
            if ($vnpParams['vnp_ResponseCode'] == '00') {
                $amount = $vnpParams['vnp_Amount'] / 100;
                $coin = $amount / 1000;

                $user = Auth::user();
                $user->coin = ($user->coin ?? 0) + $coin;
                $user->save();

                Transaction::create([
                    'user_id' => $user->id,
                    'coin' => $coin,
                    'bank' => $vnpParams['vnp_BankCode'] ?? '',
                    'code' => $vnpParams['vnp_TxnRef'] ?? '',
                    'status' => 'success',
                ]);

                History::create([
                    'id_client' => $user->id,
                    'coint' => $coin,
                    'type' => 'deposit',
                ]);

                app(TelegramService::class)->send(
                    "<b>Nạp tiền thành công</b>\n"
                    . "Người dùng: {$user->name}\n"
                    . "Số tiền: " . number_format($amount) . " VNĐ\n"
                    . "Coin nhận: {$coin} coin\n"
                    . "Ngân hàng: " . ($vnpParams['vnp_BankCode'] ?? 'N/A') . "\n"
                    . "Thời gian: " . now()->format('d/m/Y H:i')
                );

                $result = [
                    'status' => 'success',
                    'message' => 'Nạp tiền thành công!',
                    'amount' => $amount,
                    'code' => $vnpParams['vnp_TxnRef'] ?? '',
                    'bank' => $vnpParams['vnp_BankCode'] ?? '',
                ];
            } else {
                Transaction::create([
                    'user_id' => Auth::id(),
                    'coin' => ($vnpParams['vnp_Amount'] / 100) / 1000,
                    'bank' => $vnpParams['vnp_BankCode'] ?? '',
                    'code' => $vnpParams['vnp_TxnRef'] ?? '',
                    'status' => 'failed',
                ]);

                $result = [
                    'status' => 'failed',
                    'message' => 'Nạp tiền thất bại!',
                    'amount' => $vnpParams['vnp_Amount'] / 100,
                    'code' => $vnpParams['vnp_TxnRef'] ?? '',
                    'bank' => $vnpParams['vnp_BankCode'] ?? '',
                ];
            }
        } else {
            $result = [
                'status' => 'failed',
                'message' => 'Chữ ký không hợp lệ!',
                'amount' => 0,
                'code' => '',
                'bank' => '',
            ];
        }

        return view('payment.deposit-result', compact('result'));
    }

    public function balance()
    {
        $user = Auth::user();

        return view('payment.balance', compact('user'));
    }

    public function transactionHistory()
    {
        $transactions = Auth::user()->transactions()->latest()->paginate(10);

        return view('payment.transaction-history', compact('transactions'));
    }

    public function transactionHistoryCoin()
{
    $histories = Auth::user()->histories()->latest()->paginate(10);

    return view('payment.money-coin', compact('histories'));
}
}
