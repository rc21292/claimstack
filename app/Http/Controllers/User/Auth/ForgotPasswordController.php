<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /*
     * Only guests for "superuser" guard are allowed except
     * for logout.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function showLinkRequestForm()
    {
        return view('user.auth.passwords.email');
    }

    protected function broker()
    {
        return Password::broker('users');
    }

    public function guard()
    {
        return Auth::guard('user');
    }

}
