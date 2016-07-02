<?php

namespace App\Http\Controllers\Admin;

use App\AdminUser;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth, Input;
use App\User;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	private   $redirectTo 			= '/admin';
	protected $loginPath  		    = '/admin/login';
	protected $redirectAfterLogout  ='/admin/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

	public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('admin.login');
    }
    public function adminLogin(){
        $input = Input::all();

        if(count($input) > 0){
            $auth = auth()->guard('admin');
           // print_r($input);


            $credentials = [
                'email' =>  $input['email'],
                'password' =>  $input['password'],
            ];

            if ($auth->attempt($credentials)) {

               return redirect()->action('App\laraCms\Admin\Controller\AdminPagesController@home');
            } else {

                return redirect()->back()
                    ->withInput(Input::only('username', 'password'))
                    ->withErrors([
                        $this->loginUsername() => $this->getFailedLoginMessage(),
                    ]);
            }
        } else {

            return view('admin.login');
        }
    }


    public function getLogout()
    {
        return $this->logout();
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }


	
}