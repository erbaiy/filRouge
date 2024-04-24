<?php

namespace App\Mail;

use App\Models\{User, Ticket, Reservation, Room};
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;

class ReservationTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $ticket, $reservation, $room;

    public function __construct(User $user, Ticket $ticket, Reservation $reservation, Room $room)
    {
        $this->user = $user;
        $this->ticket = $ticket;
        $this->reservation = $reservation;
        $this->room = $room;
    }

    public function build()
    {
        $pdf = $this->generatePDF();

        return $this->from('example@example.com')
            ->view('emails.ticket')
            ->text('emails.ticket')
            ->attachData($pdf, 'reservation_ticket.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

    protected function generatePDF()
    {
        $data = ['user' => $this->user, 'ticket' => $this->ticket, 'reservation' => $this->reservation, 'room' => $this->room];
        $view = view('emails.ticket', $data)->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->render();

        return $dompdf->output();
    }
}
