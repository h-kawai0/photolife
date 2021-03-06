<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    protected function redirectTo() {
        session()->flash('flash_message', 'ログインしました!');
        return '/';
    }

    protected function logout(Request $request)
    {

        Auth::logout();

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ? : redirect('/')->with('flash_message', 'ログアウトしました!');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => ['required', 'string', 'max:255', 'email'],
            'password' => ['required', 'string', 'max:255']
        ]);
    }
}
