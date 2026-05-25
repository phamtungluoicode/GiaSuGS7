<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    protected $botToken;
    protected $chatId;

    public function __construct()
    {
        $this->botToken = config('services.telegram.bot_token');
        $this->chatId = config('services.telegram.chat_id');
    }

    public function send(string $message): bool
    {
        if (!$this->botToken || !$this->chatId) {
            return false;
        }

        try {
            $response = Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
                'chat_id' => $this->chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Telegram notification failed: ' . $e->getMessage());
            return false;
        }
    }

    public function notifyNewRegistration(string $name, string $email, string $role): void
    {
        $roleLabel = match ($role) {
            'teacher' => 'Gia su',
            'user' => 'Phu huynh',
            default => $role,
        };

        $message = "<b>Dang ky moi</b>\n"
            . "Ho va ten: {$name}\n"
            . "Email: {$email}\n"
            . "Vai tro: {$roleLabel}\n"
            . "Thoi gian: " . now()->format('d/m/Y H:i');

        $this->send($message);
    }

    public function notifyNewHire(string $userName, string $teacherName, string $subject, string $class): void
    {
        $message = "<b>Thue gia su moi</b>\n"
            . "Nguoi thue: {$userName}\n"
            . "Gia su: {$teacherName}\n"
            . "Mon hoc: {$subject}\n"
            . "Lop: {$class}\n"
            . "Thoi gian: " . now()->format('d/m/Y H:i');

        $this->send($message);
    }
}
