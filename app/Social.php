<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'socials';
    protected $fillable = ['title', 'description','link','icon','sort','is_active'];
    protected $fieldspec = [];


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
            'label'=>'Social',
            'extraMsg'=>'',
            'display'=>'1',

        ];




        $this->fieldspec['icon'] = [
            'type' =>'string',
            'size' =>600,
            'h' =>300,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'Font-Awesome class ',
            'extraMsg'=>'',
            'display'=>1,

        ];
        $this->fieldspec['link'] = [
            'type' =>'string',
            'size' =>600,
            'h' =>300,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'Social link',
            'extraMsg'=>'',
            'display'=>1,

        ];


        $this->fieldspec['image'] = [
            'type' =>'media',
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'Image',
            'extraMsg'=>'',
            'extraMsgEnabled'=>'Code',
            'lang'=>0,
            'mediaType'=>'Img',
            'display'=>1,

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
            'lang'=>0,
            'cssClass'=>'ckeditor',
            'display'=>1,


        ];
        $this->fieldspec['sort'] = [
            'type' => 'integer',
            'required' => 'y',
            'label'=>'Order',
            'hidden' => '0',
            'display'=>'1',
        ];
        $this->fieldspec['is_active']   = [
            'type' =>'boolean',
            'pkey' => 'n',
            'required' => '',
            'hidden' => '0',
            'label'=>trans('admin.label.active'),
            'display'=>'1'
        ];
      return $this->fieldspec;
    }

}
