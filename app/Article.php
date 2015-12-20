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
	public $translatedAttributes = ['title', 'description','abstract','seo_title','seo_keywords','seo_description'];
    protected $fillable = ['title', 'description','slug','sort','pub','top_menu','id_parent'];
	protected $fieldspec = [];
	
	
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
			'label'=>'Name',
			'hidden' => '1',
			'display'=>'0',
		];
		
		
		$this->fieldspec['id_parent'] = [
			'type'       => 'relation',
			'model'      => 'article',
			'foreign_key'=> 'id',
			'label_key'  => 'title',
   			'size' => 5,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'label'=>'Parent Page',
			'hidden' => '1',
			'display'=>'1',
		];
		
		$this->fieldspec['title']    = [	
			'type' =>'string',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Title',
			'extraMsg'=>'',
			'display'=>'1',
			
		];

		$this->fieldspec['abstract'] = [
				'type' =>'text',
				'size' =>600,
				'h' =>100,
				'max' => 255,
				'pkey' => 'n',
				'required' => 'y',
				'hidden' =>0,
				'label'=>'Abstract',
				'extraMsg'=>'',
				'lang'=>0,
				'cssClass'=>'',
				'display'=>0,


		];
		$this->fieldspec['description'] = [	
			'type' =>'text',
			'size' =>600,
			'h' =>300,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Description',
			'extraMsg'=>'',
			'lang'=>0,
			'cssClass'=>'ckeditor',
			'display'=>1,
		
			
		];
		
		$this->fieldspec['link'] = [	
			'type' =>'string',
			'size' =>600,
			'h' =>300,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Externa url',
			'extraMsg'=>'',
			'lang'=>1,
			'cssClass'=>'ckeditor',
			'display'=>1,
			
		];
		
		
		$this->fieldspec['image'] = [	
			'type' =>'media',
			'size' =>600,
			'h' =>300,
			'max' => 255,
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
		$this->fieldspec['doc'] = [	
			'type' =>'media',
			'size' =>600,
			'h' =>300,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Document',
			'extraMsg'=>'',
			'extraMsgEnabled'=>'Code',
			'lang'=>0,
			'mediaType'=>'Doc',
			'display'=>1,
			
		];
		$this->fieldspec['sort'] = [
			'type' => 'integer',
			'size' => 5,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'label'=>'Order',
			'hidden' => '0',
			'display'=>'1',
		];
		$this->fieldspec['pub']   = [
			'type' =>'boolean',
			'size' =>1,
			'max' => 1,
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label'=>trans('admin.label.active'),
			'display'=>'1'
       ];
	   $this->fieldspec['top_menu']   = [
			'type' =>'boolean',
			'size' =>1,
			'max' => 1,
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label'=>trans('admin.label.top_menu'),
			'display'=>'1'
       ];

		$this->fieldspec['seo_title']    = [
				'type' =>'string',
				'size' =>400,
				'max' => 255,
				'pkey' => 'n',
				'required' => 'y',
				'hidden' => '0',
				'label'=>'Seo Title',
				'extraMsg'=>'',
				'display'=>'1',

		];
		$this->fieldspec['seo_keywords'] = [
				'type' =>'string',
				'size' =>600,
				'h' =>300,
				'max' => 255,
				'pkey' => 'n',
				'required' => 'y',
				'hidden' =>0,
				'label'=>'Seo keywords, (list separated by comma like google,bing,yahoo',
				'extraMsg'=>'',
				'lang'=>0,
				'cssClass'=>'',
				'display'=>1,

		];
				$this->fieldspec['seo_description'] = [
				'type' =>'text',
				'size' =>600,
				'h' =>300,
				'max' => 255,
				'pkey' => 'n',
				'required' => 'y',
				'hidden' =>0,
				'label'=>'Seo description',
				'extraMsg'=>'',
				'lang'=>0,
				'cssClass'=>'no',
				'display'=>1,
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
}
