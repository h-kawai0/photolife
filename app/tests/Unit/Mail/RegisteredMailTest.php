<?php

namespace Tests\Unit\Mail;

use App\Mail\RegisteredMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisteredMailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBuild()
    {
        $user = factory(\App\User::class)->make();

        Mail::fake();

        Mail::to($user)
        ->send(new RegisteredMail($user));

        // メールを指定のメールアドレスに送ったことをアサート
        Mail::assertSent(RegisteredMail::class, function($mail) use ($user){
            // メールの件名をアサート
            $mail->build();
            $this->assertEquals('登録完了のお知らせ', $mail->subject);

            return $mail->hasTo($user->email);
        });

        // 1回だけ送信されたことをアサート
        Mail::assertSent(RegisteredMail::class, 1);
    }
}
