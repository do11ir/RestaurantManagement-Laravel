<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override credentials method to allow login with email or phone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Check if the input is an email or phone number
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return [
            $field => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }

    /**
     * Customize the username field used to identify users.
     *
     * @return string
     */
    public function username()
    {
        return 'email'; // Kept for compatibility with default behavior
    }
}
