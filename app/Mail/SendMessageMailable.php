<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMessageMailable extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'],
        );
    }

    //----------------------------------------
    public function build()
    {
        return $this->view(view: 'mails.results');
    }
    //----------------------------------------

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.results',
            with: [
                'content' => $this->data['content'],
                'paciente' => $this->data['paciente'],
                'fecha' => $this->data['fecha'],
                'globulosRojos' => $this->data['globulosRojos'],
                'hematocrito' => $this->data['hematocrito'],
                'hemoglobina' => $this->data['hemoglobina'],
                'VCM' => $this->data['VCM'],
                'HCM' => $this->data['HCM'],
                'CHCM' => $this->data['CHCM'],
                'VSG' => $this->data['VSG'],
                'plaquetas' => $this->data['plaquetas'],
                'recuento' => $this->data['recuento'],
                'globulosBlancos' => $this->data['globulosBlancos'],
                'promielocitos' => $this->data['promielocitos'],
                'mielocitos' => $this->data['mielocitos'],
                'metamielocitos' => $this->data['metamielocitos'],
                'cayados' => $this->data['cayados'],
                'segmentados' => $this->data['segmentados'],
                'linfocitos' => $this->data['linfocitos'],
                'monocitos' => $this->data['monocitos'],
                'eosinofilos' => $this->data['eosinofilos'],
                'basofilos' => $this->data['basofilos'],
                'grupoSanguineo' => $this->data['grupoSanguineo'],
                'factorRH' => $this->data['factorRH'],
                'VDRL' => $this->data['VDRL'],
                'baciloscopia' => $this->data['baciloscopia'],
                'coproparasitologico' => $this->data['coproparasitologico'],
                'metodo' => $this->data['metodo'],
                'resultado' => $this->data['resultado'],
            ],
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
