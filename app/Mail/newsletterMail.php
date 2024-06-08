<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newsletterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $title_content;
    public $products;
    public $facebook;
    public $instagram;
    public $whatsapp;

    /**
     * Create a new message instance.
     */
    public function __construct($title, $title_content, $products, $facebook, $instagram, $whatsapp)
    {
        $this->title = $title;
        $this->title_content = $title_content;
        $this->products = $products;
        $this->facebook = $facebook;
        $this->instagram = $instagram;
        $this->whatsapp = $whatsapp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->title);

        return $this->markdown('mail.newsletter');
    }
}
