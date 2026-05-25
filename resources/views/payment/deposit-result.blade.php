@extends('layouts.app')

@section('title', 'Kết quả nạp tiền - GS7')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white rounded-lg shadow p-6 text-center">

        @if($result['status'] === 'success')
            {{-- Thanh cong --}}
            <div class="mb-6">
                <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-green-600">{{ $result['message'] }}</h2>
            </div>
        @else
            {{-- That bai --}}
            <div class="mb-6">
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-red-600">{{ $result['message'] }}</h2>
            </div>
        @endif

        {{-- Chi tiet giao dich --}}
        <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Chi tiết giao dịch</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Số tiền:</span>
                    <span class="font-medium text-gray-900">{{ number_format($result['amount']) }} VND</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Mã giao dịch:</span>
                    <span class="font-medium text-gray-900">{{ $result['code'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Ngân hàng:</span>
                    <span class="font-medium text-gray-900">{{ $result['bank'] }}</span>
                </div>
            </div>
        </div>

        <a href="{{ route('payment.balance') }}"
            class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Quay lại số dư
        </a>
    </div>
</div>
@endsection
