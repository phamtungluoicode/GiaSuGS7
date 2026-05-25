<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $jobData;

    public function __construct(array $jobData)
    {
        $this->jobData = $jobData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Yêu cầu thuê gia sư mới - GS7',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.hire-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
