<?php
namespace App\laraCms\Website\Controllers;
use App\laraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @property ArticleRepositoryInterface articleRepo
 */
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
    | MA@laraCms custom auth views has been created
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo            = '/users/dashboard';
    protected $loginPath  		     = '/users/login';
    protected $redirectPath          = '/users/dashboard';
    protected $redirectAfterLogout   = '/users/login';
    protected $localePrefix          =  '';

    /**
     * Create a new authentication controller instance.
     * and  setup  some localized  variables
     *
     * @param ArticleRepositoryInterface $article
     */
    public function __construct( ArticleRepositoryInterface $article)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->articleRepo          = $article;

        $this->localePrefix         = $this->getRealLocale();
        $this->redirectTo           = $this->localePrefix.'/users/dashboard';
        $this->redirectPath         = $this->localePrefix.'/users/dashboard';
        $this->loginPath            = $this->localePrefix.'/users/login';
        $this->redirectAfterLogout  = $this->localePrefix.'/users/login';

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'real_password' => $data['password'],
        ]);
    }

    /**
     *  Override  getLogin Method
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        $article =$this->articleRepo->getBySlug('login');
        return view('website.auth.login',compact('article'));
    }

    /**
     * Calculate the current Locale path  prefix if needed
     * @return string
     */
    protected function getRealLocale()
    {
        return (LaravelLocalization::getCurrentLocale()==LaravelLocalization::getDefaultLocale())?'':'/'.LaravelLocalization::getCurrentLocale();
    }
}