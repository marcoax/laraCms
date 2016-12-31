<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable  = ['title','country_id'];
    protected $fieldspec = [];

    public function country() {
        return $this->belongsTo('App\Country');
    }

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
        $this->fieldspec['country_id'] = [
            'type'      => 'relation',
            'model'     => 'Country',
            'foreign_key' => 'id',
            'label_key' => 'name',
            'label'     => 'Country',
            'hidden'    => '0',
            'required'  =>  true,
            'display'   => '1',
        ];
        $this->fieldspec['title']    = [
            'type' =>'string',
            'size' =>400,
            'max' => 255,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Name',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['pub'] = [
            'type'     => 'boolean',
            'required' => false,
            'hidden'   => '0',
            'label'    => trans('admin.label.active'),
            'display'  => '1'
        ];
        return $this->fieldspec;
    }
}
