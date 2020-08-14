<?php

namespace App\Mail;
use App\Models\Customer_tour;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class tourMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $CustomerTour;
    public function __construct(Tour $CustomerTour)
    {
        //
         $this->CustomerTour = $CustomerTour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('zeinabyounes099@gmail.com')->view('tourMail');
    }
}
