<?php

namespace App\laraCms\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
    |  MA@laraCms laravel default  auth views has been used
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

    /**
     * custom resetPassword for admin
     * @param $user
     * @param $password
     *
     */
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' =>$password, // Changed by Ma
            'real_password' =>$password, // Changed by Ma
            'remember_token' => Str::random(60),
        ])->save();
        Auth::guard($this->getGuard())->login($user);
    }
}