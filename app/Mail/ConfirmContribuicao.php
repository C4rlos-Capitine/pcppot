<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmContribuicao extends Mailable
{
    use Queueable, SerializesModels;
    public $contribuicao;
    /**
     * Create a new message instance.
     */
    public function __construct($contribuicao)
    {
        $this->contribuicao = $contribuicao;
    }
    public function build()
    {
        return $this->view('mails.confirm_contribuicao')
                    ->with(['contribuicao' => $this->contribuicao]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmação da Contribuição',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.confirm_contribuicao',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
