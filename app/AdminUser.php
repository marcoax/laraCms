<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;

/*GF_ma for laraCms*/
use App\LaraCms\Presenter\AdminUserPresenter;
use App\LaraCms\Notifications\AdminResetPasswordNotification as AdminUserResetPasswordNotification;

class AdminUser extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
	use EntrustUserTrait; // add this trait to your user model
    use Notifiable;
    /*Gf_ma for laraCms*/
    use AdminUserPresenter;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adminusers';


    protected $fillable = ['first_name','last_name', 'email', 'password','is_active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password','remember_token'];
    protected $fieldspec = [];

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        if($password !=''){
            $this->attributes['password'] = bcrypt($password);
            //  set  also the real password only for  demo purpose must not fillable
            $this->attributes['real_password'] = $password;
        }
    }

    /**
     * @param $roles
     */
    public function saveRoles($roles)
    {
        if(!empty($roles))
        {
            $this->roles()->sync($roles);
        } else {
            $this->roles()->detach();
        }
    }

    /**
     * @return array
     */
    function getFieldSpec ()
    // set the specifications for this database table
    {

        // build array of field specifications
        $this->fieldspec['id'] = [
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' =>true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];
        $this->fieldspec['first_name'] = [
            'type' =>'string',
            'required' =>true,
            'hidden' => '0',
            'label'=>'First Name',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['last_name'] = [
            'type' =>'string',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Last Name',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['email']    = [
            'type'=>'string',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Email',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['role'] = [
            'type'       	=>'relation',
            'model'      	=>'Role',
            'relation_name' =>'roles',
            'foreign_key'   => 'id',
            'label_key'     => 'display_name',
            'required'      => true,
            'label'         => 'Role',
            'hidden'        => $this->hideEditRole(),
            'display'       => '1',
            'multiple'      => true,
        ];
        $this->fieldspec['password']    = [
            'type' =>'password',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Password',
            'extraMsg'=>'',
            'display'=>'1',
            'template'=>'password'
        ];
        $this->fieldspec['is_active'] = [
            'type'     => 'boolean',
            'required' => false,
            'hidden'   => '0',
            'label'    => trans('admin.label.active'),
            'display'  => '1'
        ];
        return $this->fieldspec;
    }

    /*
    |--------------------------------------------------------------------------
    | Simple ACL Role
    |--------------------------------------------------------------------------
    |

    /**
     * GF_ma gestione semplice delle sezioni
     * in base hai ruoli
     * @param $section
     * @return bool
     */
    public function canViewSection( $section ){
        if(!isset($section['roles'])) return true;
        if( $this->hasRole($section['roles']) ) return  true;
        else return false;
    }

    /**
     * GF_ma utenti con ruolo
     * su or  admin
     * @return int
     */
    public function isAdmin(  ){
        return ( Auth::guard('admin')->user()->hasRole(['su','admin']) ) ? 1 : 0 ;
    }
    /**
     *
     * GF_ma semplice gestione assegnazione ruoli
     * solo admin e su possono asegnare
     * i ruoli agli utenti del cms
     * @return int
     */
    public function hideEditRole(){
        return ( $this->isAdmin() ) ? 0 : 1 ;
    }

    /**
     *
     * GF_ma gestione funzionalità
     * di delete per ruolo
     * @return int
     */
    public function canDelete(  ){
        return ( Auth::guard('admin')->user()->hasRole(['su','admin']) ) ? 1 : 0 ;
    }

    /*
    |--------------------------------------------------------------------------
    | Notifiable override the sendPasswordResetNotification
    |--------------------------------------------------------------------------
    |
    */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminUserResetPasswordNotification($token));
    }
	  
}
