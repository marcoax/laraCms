<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $fillable = ['name', 'display_name', 'description'];
	protected $fieldspec = [];
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
		
		$this->fieldspec['display_name']    = [	
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Display Name',
			'extraMsg'=>'',
			'display'=>'1',
			
		];
		
		$this->fieldspec['description'] = [	
			'type' =>'text',
			'size' =>600,
			'h' =>300,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Description',
			'extraMsg'=>'',
			'cssClass'=>'',
			'display'=>1,
			
		];
		
		return $this->fieldspec;
	}
}