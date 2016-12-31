<?php

namespace App\laraCms\Admin\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo            = '/admin';
    protected $loginPath  		     = '/admin/login';
    protected $redirectPath          = '/admin';
    protected $redirectAfterLogout   = '/admin';
    protected $localePrefix          =  '';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('adminauth', ['except' => 'logout']);
    }

    public function showLoginForm()
    {

        return view('admin.login');
    }




    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $this->redirectAfterLogout;
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}
