<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
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
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' =>true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];
		$this->fieldspec['name']    = [
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' =>true,
			'hidden' => '0',
			'label'=>'Name',
			'extraMsg'=>'',
			'display'=>'1'
		];
		$this->fieldspec['display_name']    = [	
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' =>true,
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
			'required' =>true,
			'hidden' =>0,
			'label'=>'Description',
			'extraMsg'=>'',
			'cssClass'=>'',
			'display'   =>  1,
		];
		return $this->fieldspec;
	}
}