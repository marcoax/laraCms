<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    use \Dimsav\Translatable\Translatable;

    protected   $table = 'media';
    public      $translatedAttributes = ['title','description'];
    protected   $fillable = ['title','description','sort'];
    protected   $fieldspec = [];


    public function media()
    {
        return $this->morphTo();
    }

    function getFieldSpec ()
        // set the specifications for this database table
    {

        // build array of field specifications
        $this->fieldspec['id'] = [
            'type' => 'integer',
            'pkey' => 'y',
            'required' => 'y',
            'label'=>'Name',
            'hidden' => '1',
            'display'=>'0',
        ];

        $this->fieldspec['title']    = [
            'type' =>'string',
            'size' =>400,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => '0',
            'label'=>'Title',
            'extraMsg'=>'',
            'display'=>'1',
        ];

        $this->fieldspec['description'] = [
            'type' =>'text',
            'size' =>600,
            'h' =>300,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'Description',
            'extraMsg'=>'',
            'cssClass'=>'ckeditor',
            'display'=>1,
        ];
        $this->fieldspec['file_name'] = [
            'type' =>'readonly',
            'size' => 600,
            'h' => 300,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' => 0,
            'label' => 'File name',
            'extraMsg' => '',
            'lang' => 0,
            'display' => 1,
        ];

        $this->fieldspec['sort'] = [
            'type' => 'integer',
            'required' => 'y',
            'label'=>'Order',
            'hidden' => '0',
            'display'=>'1',
            'cssClassElement'=>'col-md-2',
        ];
        $this->fieldspec['pub'] = [
            'type' => 'boolean',
            'pkey' => 'n',
            'required' => '',
            'hidden' => '0',
            'label' => trans('admin.label.active'),
            'display' => '1'
        ];

        return $this->fieldspec;
    }

}
