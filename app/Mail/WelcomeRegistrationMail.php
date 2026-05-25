<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $userData;

    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chào mừng bạn đến với GS7 - Tìm Kiếm Gia Sư',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-registration',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
