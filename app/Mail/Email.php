<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $text;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $text, $link){
        $this->title = $title;
        $this->text = $text;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hubsi.systen@gmail.com', 'SystEN')
            ->subject($this->title)
            ->markdown('email.email')
            ->with([
                'link' => $this->link,
                'text' => $this->text,
            ]);
    }
}
