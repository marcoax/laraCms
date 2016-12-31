<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    public 	  $translatedAttributes = ['title'];

    protected $fillable  = ['title','description','sort','pub','code'];
    protected $fieldspec = [];


    function getFieldSpec ()
    // set the specifications for this database table
    {

        // build array of field specifications
        $this->fieldspec['id'] = [
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' => true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];
        $this->fieldspec['title']    = [
            'type'      => 'string',
            'size'      => 400,
            'required'  => true,
            'hidden'    => '0',
            'label'     => 'Title',
            'extraMsg'  => '',
            'display'   => '1',
        ];
        $this->fieldspec['code'] = [
            'type'      => 'string',
            'size'      => 600,
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => 1,
            'label'     => 'Code',
            'extraMsg'  => '',
            'display'   => 0,
        ];
        $this->fieldspec['description'] = [
            'type'      => 'text',
            'size'      => 600,
            'h'         => 300,
            'required'  => true,
            'hidden'    => 1,
            'label'     => 'Description',
            'extraMsg'  => '',
            'cssClass'  => 'ckeditor',
            'display'   => 0,
        ];

        $this->fieldspec['image'] = [
            'type'      => 'media',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Icon <br> 150 x 150     px',
            'extraMsg'  => '',
            'extraMsgEnabled' => 'Code',
            'lang'      => 0,
            'mediaType' =>'Img',
            'display'   => 1,
        ];
        $this->fieldspec['sort'] = [
            'type'     => 'integer',
            'required' => false,
            'label'    => 'Order',
            'hidden'   => '0',
            'display'  => '1',
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
