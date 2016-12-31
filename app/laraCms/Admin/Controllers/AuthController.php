<?php namespace App\LaraCms\Admin\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Validator;
use Input;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |LaraCms Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * The redirect path after login success.
     * @var string
     */
    protected $redirectTo = '/admin/';

    /**
     * Login path.
     *
     * @var string
     */
    protected $loginPath = '/admin/login';

    /**
     * The redirect path after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout = '/admin/login';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.login');
    }

    /**
     * This method is used to authenticate an admin.
     *
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function adminLogin()
    {
        $input = Input::all();

        if (count($input) > 0) {

            $auth = auth()->guard('admin');
            $credentials = [
                'email'    => $input['email'],
                'password' => $input['password'],
            ];

            if ($auth->attempt($credentials)) {

                // Make sure that the user is authorized.
                if ($auth->user()->is_active == 1)
                    return redirect()->action('\App\LaraCms\Admin\Controllers\AdminPagesController@home');
                else {

                    Auth::guard('admin')->logout();

                    return redirect()->back()->withErrors([
                        'unauthorized' => Lang::has('auth.unauthorized') ? Lang::get('auth.unauthorized') : 'You are not authorized to proceed.',
                    ]);
                }
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

    /**
     * @return \Illuminate\Http\Response
     */
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

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/admin');
    }
}