<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcceptTeachingMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $teacherData;

    public function __construct(array $teacherData)
    {
        $this->teacherData = $teacherData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gia sư đã đồng ý dạy - GS7',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.accept-teaching',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
