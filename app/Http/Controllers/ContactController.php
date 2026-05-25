<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'note' => 'nullable|string|max:191',
        ]);

        $contact = Contact::create($request->only('name', 'phone', 'note'));

        app(TelegramService::class)->send(
            "<b>Liên hệ mới</b>\n"
            . "Họ tên: {$contact->name}\n"
            . "SĐT: {$contact->phone}\n"
            . "Ghi chú: " . ($contact->note ?? 'Không có') . "\n"
            . "Thời gian: " . now()->format('d/m/Y H:i')
        );

        return back()->with('success', 'Gửi liên hệ thành công! Chúng tôi sẽ liên hệ lại với bạn sớm nhất.');
    }
}
