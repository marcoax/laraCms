<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

	use \Dimsav\Translatable\Translatable;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public 	  $translatedAttributes = ['title','subtitle','intro','description','abstract','seo_title','seo_keywords','seo_description'];
	public    $sluggable = ['slug'];
    protected $fillable  = ['title','subtitle','intro','description','abstract', 'slug','sort','pub','top_menu','id_parent','template_id','link'];
	protected $fieldspec = [];


	public function media()
	{
		return $this->morphMany('App\Media', 'model');
	}

    public function template()
    {
        return $this->belongsTo('App\Domain', 'template_id', 'id');
    }

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
			'label' => 'Name',
			'hidden' => '1',
			'display' => '0',
		];

        $this->fieldspec['template_id'] = [
            'type' => 'relation',
            'model' => 'Domain',
            'filter'    =>  ['domain' => 'template'],
            'foreign_key' => 'id',
            'label_key' => 'title',
            'required' => false,
            'label' => 'Template',
            'hidden' => '0',
            'display' => '1',
        ];

		$this->fieldspec['id_parent'] = [
			'type' => 'relation',
			'model' => 'article',
			'foreign_key' => 'id',
			'label_key' => 'title',
			'pkey' => 'y',
			'required' => 'y',
			'label' => 'Parent Page',
			'hidden' => '0',
			'display' => '1',
		];

		$this->fieldspec['title'] = [
			'type' => 'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label' => 'Title',
			'extraMsg' => '',
			'display' => '1',
		];

		$this->fieldspec['slug'] = [
			'type' => 'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Slug',
			'extraMsg' => '',
			'display' => 1,
		];

		$this->fieldspec['subtitle'] = [
			'type' => 'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label' => 'Subtitle',
			'extraMsg' => '',
			'display' => '1',
		];

		$this->fieldspec['description'] = [
			'type' => 'text',
			'size' => 600,
			'h' => 300,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Description',
			'extraMsg' => '',
			'cssClass' => 'ckeditor',
			'display' => 1,
		];
		$this->fieldspec['abstract'] = [
			'type' => 'text',
			'size' => 600,
			'h' => 100,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Abstract or  text  right column',
			'extraMsg' => '',
			'cssClass' => 'ckeditor',
			'display' => 1,
		];
		$this->fieldspec['intro'] = [
			'type' => 'text',
			'size' => 600,
			'h' => 100,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Abstract or  right side  column',
			'extraMsg' => '',
			'cssClass' => '',
			'display' => 0,
		];

        $this->fieldspec['link'] = [
            'type' => 'string',
            'required' => false,
            'hidden' => 0,
            'label' => 'External url',
            'extraMsg' => '',
            'display' => 1,
        ];


		$this->fieldspec['image'] = [
			'type' => 'media',
			'size' => 600,
			'h' => 300,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Image',
			'extraMsg' => '',
			'extraMsgEnabled' => 'Code',
			'mediaType' => 'Img',
			'display' => 1,

		];
		$this->fieldspec['doc'] = [
			'type' => 'media',
			'size' => 600,
			'h' => 300,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => 0,
			'label' => 'Document',
			'extraMsg' => '',
			'lang' => 0,
			'mediaType' => 'Doc',
			'display' => 1,

		];
		$this->fieldspec['sort'] = [
			'type' => 'integer',
			'pkey' => 'y',
			'required' => 'y',
			'label' => 'Order',
			'hidden' => '0',
			'display' => '1',
		];
		$this->fieldspec['pub'] = [
			'type' => 'boolean',
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label' => trans('admin.label.active'),
			'display' => '1'
		];
		$this->fieldspec['top_menu'] = [
			'type' => 'boolean',
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label' => trans('admin.label.top_menu'),
			'display' => '1'
		];
		$this->fieldspec['seo_title'] = [
			'type' => 'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label' => 'Seo Title',
			'extraMsg' => '',
			'display' => '1',

		];
		$this->fieldspec['seo_keywords'] = [
			'type' => 'string',

			'pkey' => 'n',
			'hidden' => 0,
			'label' => 'Seo keywords, (list separated by comma like google,bing,yahoo',
			'extraMsg' => '',
			'cssClass' => '',
			'display' => 1,

		];
		$this->fieldspec['seo_description'] = [
			'type' => 'text',
			'size' => 600,
			'h' => 300,
			'pkey' => 'n',
			'hidden' => 0,
			'label' => 'Seo description',
			'extraMsg' => '',
			'cssClass' => 'no',
			'display' => 1,
		];
		return $this->fieldspec;
	}
	
	/**
     * Get the phone record associated with the user.
     */
    public function parentPage()
    {
        return $this->hasOne('App\Article','id','id_parent');
    }

	public function scopePublished($query)    {

		$query->where('pub', '=',1 );
	}
	public function scopeTop($query)    {
		$query->where('top_menu', '=',1 )->orderBy('sort', 'asc');
	}
	public function scopeChildren($query,$id='')    {
		 $query->where('id_parent', '=',$id )->orderBy('sort', 'asc');
	}
}
