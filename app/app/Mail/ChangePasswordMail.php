<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * ユーザインスタンス
     * @var User
     */

     public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('パスワード変更のお知らせ')
        ->view('emails.changePassword');
    }
}
