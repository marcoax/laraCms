<?php

namespace App\LaraCms\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class AdminPasswordController extends Controller
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
  
    protected $redirectTo   = '/admin/';
    protected $guard        = 'admin';
    protected $broker       = 'admin';
    use ResetsPasswords;
	
    /**
     * Create a new password controller instance.
     * AdminPasswordController constructor.
     */
    public function __construct()
    {

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
