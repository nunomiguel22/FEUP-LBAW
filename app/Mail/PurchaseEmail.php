<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $total;
    protected $uuid;

    public function __construct($total, $uuid)
    {
        $this->total = $total;
        $this->uuid = $uuid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("[OGS] Waiting Payment")->view('mail.purchase')->with(['amount' => $this->total,
                'uuid' =>  $this->uuid]);
    }
}
