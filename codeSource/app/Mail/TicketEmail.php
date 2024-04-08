<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $ticket;
    public $pdfContents;

    /**
     * Create a new message instance.
     *
     * @param array $emailData
     * @param string $pdfContents
     * @return void
     */
    public function __construct(array $emailData, string $pdfContents)
    {
        $this->user = $emailData['user'];
        $this->ticket = $emailData['ticket'];
        $this->pdfContents = $pdfContents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Ticket')
            ->attachData($this->pdfContents, 'ticket.pdf', [
                'mime' => 'application/pdf',
            ])
            ->view('emails.ticket');
    }
}
