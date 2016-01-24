<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['subject','name', 'email', 'surname','message','replay','status'];
    protected $fieldspec = [];
    function getFieldSpec ()
    // set the specifications for this database table
    {

        // build array of field specifications
        $this->fieldspec['created_at'] = [
            'type' => 'date-readonly',
            'pkey' => 'n',
            'required' => '',
            'hidden' => '0',
            'label' => trans('admin.label.created_at'),
            'display' => '1'
        ];
        $this->fieldspec['id'] = [
            'type' => 'integer',
            'size' => 5,
            'pkey' => 'y',
            'required' => 'y',
            'hidden' => '1',
            'display' => '0',
        ];

        $this->fieldspec['email']    = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => '0',
            'label'=>'Email',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['name']    = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => '0',
            'label'=>'Name',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['surname']    = [
            'type' =>'readonly',
            'size' =>400,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => '0',
            'label'=>'Surname',
            'extraMsg'=>'',
            'display'=>'1',
        ];

        $this->fieldspec['subject'] = [
            'type' => 'readonly',
            'pkey' => 'n',
            'required' => 'y',
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
            'required' => 'y',
            'hidden' => 0,
            'label' => 'Message',
            'extraMsg' => '',
            'display' => 1,

        ];
        $this->fieldspec['replay'] = [
            'type' => 'text',
            'size' => 600,
            'h' => 300,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => 0,
            'label' => trans('admin.message.replay_message'),
            'extraMsg' => '',
            'display' => 1,
            'readonly' => 1,
        ];

        $this->fieldspec['status'] = [
            'type' => 'boolean',
            'pkey' => 'n',
            'required' => '',
            'hidden' => '0',
            'label' => trans('admin.label.read'),
            'display' => '1'
        ];



        return $this->fieldspec;
        }
}
