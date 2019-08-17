<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $msg)
    {
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Sending Bulk mail to specific user with the template

        return $this->subject($this->subject)->view('mail.mail_template');
    }
}
