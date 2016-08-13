<?php

namespace App\laraCms\Website\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
  
    protected $redirectTo = '/users/login/';

    use ResetsPasswords;
    protected $linkRequestView = "website.auth.password";
    protected $resetView       = "website.auth.reset";
	
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */

    public function getEmail()
    {
        return $this->showLinkRequestForm();
    }
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' =>$password,
            'real_password' =>$password,
            'remember_token' => Str::random(60),
        ])->save();

        Auth::guard($this->getGuard())->login($user);
    }
}
