<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class AdminUser extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
	use EntrustUserTrait; // add this trait to your user model

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adminusers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','is_active'];

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
			'type' => 'integer',
			'size' => 5,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'label'=>'Name',
			'hidden' => '1',
			'display'=>'0',
		];
		
		$this->fieldspec['name']    = [	
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Name',
			'extraMsg'=>'',
			'display'=>'1',
			
		];
		
		$this->fieldspec['email']    = [	
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Email',
			'extraMsg'=>'',
			'display'=>'1',
			
		];
		$this->fieldspec['role'] = [
			'type'       		=> 'relation',
			'model'      		=> 'Role',
			'relation_name'     => 'roles',
			'foreign_key'=> 'id',
			'label_key'  => 'display_name',
   			'size' => 5,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'label'=>'Role',
			'hidden' => '1',
			'display'=>'1',
			 'multiple' => true,
		];
		
		$this->fieldspec['password']    = [	
			'type' =>'password',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Password',
			'extraMsg'=>'',
			'display'=>'1',
			'template'=>'password'
		];
		$this->fieldspec['is_active']   = [
			'type' =>'boolean',
			'size' =>1,
			'max' => 1,
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label'=>trans('admin.label.active'),
			'display'=>'1'
       ];
		
		return $this->fieldspec;
	}
	  
}