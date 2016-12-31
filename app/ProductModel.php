<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    use \Dimsav\Translatable\Translatable;

    public    $translatedAttributes = ['title','description'];
    protected $fillable  = ['product_id','title','description','sort','pub'];
    protected $fieldspec = [];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function finishing()
    {
        return $this->belongsTo('App\Domain');
    }
    function getFieldSpec ()
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
        $this->fieldspec['product_id'] = [
            'type'      => 'relation',
            'model'     => 'Product',
            'foreign_key' => 'id',
            'label_key' => 'title',
            'label'     => 'Product',
            'hidden'    => '0',
            'required'  =>  false,
            'display'   => '1',

        ];
        $this->fieldspec['title'] = [
            'type' => 'string',
            'required' =>true,
            'hidden' => '0',
            'label' => 'Title',
            'extraMsg' => '',
            'display' => '1',
        ];
        $this->fieldspec['image'] = [
            'type' => 'media',
            'size' => 600,
            'h' => 300,
            'pkey' => 'n',
            'required' =>true,
            'hidden' => 0,
            'label' => 'Cover Image',
            'extraMsg' => '',

            'mediaType' => 'Img',
            'display' => 1,
        ];
        $this->fieldspec['description'] = [
            'type' => 'text',
            'required' => false,
            'hidden' => 0,
            'label' => 'Description',
            'extraMsg' => '',
            'cssClass' => 'ckeditor',
            'display' => 1,
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
