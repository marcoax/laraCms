<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HpSlider extends Model
{
    protected $table = 'hpsliders';
    protected $fillable = ['title', 'description','slug','link','sort','is_active'];
    protected $fieldspec = [];

    public function setSlugAttribute($value)
    {
        $slug = ($value=='')? str_slug($this->title) :str_slug($value);
        if( $this->id!='') $count =self::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $this->id)->count();
        else $count =self::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $this->attributes['slug'] =$count ? "{$slug}-{$count}" : $slug;
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
            'type' =>'string',
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'Caption',
            'extraMsg'=>'',
            'lang'=>0,
            'cssClass'=>'ckeditor',
            'display'=>1,
        ];
        $this->fieldspec['slug'] = [
            'type' =>'string',
            'size' =>600,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>1,
            'label'=>'Slug',
            'extraMsg'=>'',
            'display'=>0,

        ];
        $this->fieldspec['link'] = [
            'type' =>'string',
            'size' =>600,
            'pkey' => 'n',
            'required' => 'y',
            'hidden' =>0,
            'label'=>'External link  (optional)',
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




    public function scopeActive($query)    {

        $query->where('is_active', '=',1 );
    }

}
