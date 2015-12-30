<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
	use EntrustUserTrait; // add this trait to your user model

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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



	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
		//  set  also the real password only for  demo purpose must not fillable
		if($password !='')$this->attributes['real_password'] = $password;


	}


	
	public function saveRoles($roles)
	{
	    if(!empty($roles))
	    {
	        $this->roles()->sync($roles);
	    } else {
	        $this->roles()->detach();
	    }
	}
	public function setSlug($value)
    {
        $this->attributes['slug'] = $article->slug 		    =  Str::slug($value, '-');;
    }
	
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
			'model'      		=> 'role',
			'relation_name'      => 'roles',
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
