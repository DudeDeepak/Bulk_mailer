<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $msg)
    {
        $this->msg = $msg;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('welcome');

        $name = env('MAIL_FROM_NAME');
        $address = env('MAIL_FROM_EMAIL');

        return $this->view('mail.mail_template')
                    ->from($address, $name)
                    ->subject($this->subject);
    }
}
