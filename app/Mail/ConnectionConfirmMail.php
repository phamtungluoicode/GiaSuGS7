<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConnectionConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận kết nối thành công - GS7',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.connection-confirm',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
