<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectTeachingMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $teacherName;

    public function __construct(string $teacherName)
    {
        $this->teacherName = $teacherName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gia sư đã từ chối - GS7',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reject-teaching',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
