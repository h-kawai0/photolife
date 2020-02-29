<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * 会員登録のテスト
     */

     public function testRegister()
     {
         Event::fake();

         // 新規会員登録の送信
         $user = factory(\App\User::class)->make();
         $user = $user->toArray();
         $user['password'] = 'testtest';
         $user['password_confirmation'] = 'testtest';

         $response = $this->post('/register', $user);

         // homeページへのリダイレクトをアサート
         $response->assertRedirect('/home');

         // 送信したユーザ情報がDBにあることをアサート
         $this->assertDatabaseHas('users', [
             'name' => $user['name'],
             'email' => $user['email']
         ]);

         // イベントがディスパッチされたことをアサート
         Event::assertDispatched(Registered::class, function($event) use ($user) {
             return $event->user->email === $user['email'];
         });

         // イベントが1回だけディスパッチされたことをアサート
         Event::assertDispatched(Registered::class, 1);
     }
}
