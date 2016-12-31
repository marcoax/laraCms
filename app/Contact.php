<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['request_product_id','name','surname','subject','company','email', 'message', 'status'];
    protected $fieldspec = [];
	
	public function product() {
        return $this->belongsTo('App\Product','request_product_id','id');
    }
	
    function getFieldSpec ()
    // set the specifications for this database table
    {

        // build array of field specifications
        $this->fieldspec['created_at'] = [
            'type' => 'date-readonly',
            'pkey' => 'n',
            'required' => false,
            'hidden' => '0',
            'label' => trans('admin.label.created_at'),
            'display' => '1'
        ];
        $this->fieldspec['request_product_id'] = [
            'type' => 'integer',
            'size' => 5,
            'pkey' => 'y',
            'required' =>true,
            'hidden' => '1',
            'display' => '0',
        ];
        $this->fieldspec['id'] = [
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' =>true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];
        $this->fieldspec['email'] = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Email',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['name'] = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Name',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['company'] = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Azienda',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['subject'] = [
            'type' => 'readonly',
            'pkey' => 'n',
            'required' =>true,
            'hidden' => '0',
            'label' => 'Subject',
            'extraMsg' => '',
            'display' => '1',
        ];
        $this->fieldspec['message'] = [
            'type' => 'readonly',
            'size' => 600,
            'h' => 300,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => 1,
            'label' => 'Message',
            'extraMsg' => '',
            'display' => 0,

        ];
        $this->fieldspec['status'] = [
            'type' => 'boolean',
            'pkey' => 'n',
            'required' => false,
            'hidden' => '0',
            'label' => trans('admin.label.read'),
            'display' => '1'
        ];



        return $this->fieldspec;
        }
}
