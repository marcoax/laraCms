<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{

	use \Dimsav\Translatable\Translatable;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $translatedAttributes = ['title','subtitle','intro','description','abstract','seo_title','seo_keywords','seo_description'];
    protected $fillable 		 = ['title','subtitle','intro','description','date','abstract','link', 'slug','sort','pub'];
	protected $fieldspec 		 = [];


	public function setSlugAttribute($value)
	{
		$slug = ($value=='')? str_slug($this->title) :str_slug($value);
    	if( $this->id!='') $count =self::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $this->id)->count();
		else $count =self::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		$this->attributes['slug'] =$count ? "{$slug}-{$count}" : $slug;
	}

	public function media()
	{
		return $this->morphMany('App\Media', 'model')->orderBy('sort');
	}

	public function setDateAttribute($value)
	{
		$this->attributes['date'] = Carbon::parse($value);
	}

	public function getDateAttribute($value)
	{

		return Carbon::parse($value)->format('d-m-Y');
	}
	public function getFormattedDate()
	{
  		return Carbon::parse($this->attributes['date'])->formatLocalized('%d %B %Y');
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
			'label'=>'Name',
			'hidden' => '1',
			'display'=>'0',
		];
		
		

		$this->fieldspec['date']    = [
			'type' =>'date',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Publish date',
			'extraMsg'=>'',
			'display'=>'1',
			'cssClass'=>'datepicker',
			'cssClassElement' =>'col-sm-2',
		];

		$this->fieldspec['title']    = [	
			'type' =>'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Title',
			'extraMsg'=>'',
			'display'=>'1',
		];

		$this->fieldspec['slug'] = [
				'type' =>'string',
				'pkey' => 'n',
				'required' => 'y',
				'hidden' =>0,
				'label'=>'Slug',
				'extraMsg'=>'',
				'display'=>1,
		];

		$this->fieldspec['subtitle']  = [
			'type' =>'string',
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>'Subtitle',
			'extraMsg'=>'',
			'display'=>'0',
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
		$this->fieldspec['abstract'] = [
			'type' =>'text',
			'size' =>600,
			'h' =>100,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Abstract or  text  right column',
			'extraMsg'=>'',
			'cssClass'=>'ckeditor',
			'display'=>0,
		];
		$this->fieldspec['intro'] = [
			'type' =>'text',
			'size' =>600,
			'h' =>100,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'News Excerpt',
			'extraMsg'=>'',
			'cssClass'=>'ckeditor',
			'display'=>0,
		];
		
		$this->fieldspec['link'] = [	
			'type' =>'string',
			'size' =>600,
			'h' =>300,
			'required' => 'y',
			'hidden' =>0,
			'label'=>'External url',
			'extraMsg'=>'',
			'display'=>1,
			
		];
		
		
		$this->fieldspec['image'] = [	
			'type' =>'media',
			'size' =>600,
			'h' =>300,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Image',
			'extraMsg'=>'',
			'extraMsgEnabled'=>'Code',
			'mediaType'=>'Img',
			'display'=>1,
			
		];
		$this->fieldspec['doc'] = [	
			'type' =>'media',
			'size' =>600,
			'h' =>300,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' =>0,
			'label'=>'Document',
			'extraMsg'=>'',
			'lang'=>0,
			'mediaType'=>'Doc',
			'display'=>0,
			
		];
		$this->fieldspec['sort'] = [
			'type' => 'integer',
			'pkey' => 'y',
			'required' => 'y',
			'label'=>'Order',
			'hidden' => '0',
			'display'=>'1',
		];
		$this->fieldspec['pub']   = [
			'type' =>'boolean',
			'pkey' => 'n',
			'required' => '',
			'hidden' => '0',
			'label'=>trans('admin.label.active'),
			'display'=>'1'
       ];
	 		$this->fieldspec['seo_title']    = [
				'type' =>'string',
				'pkey' => 'n',
				'required' => 'y',
				'hidden' => '0',
				'label'=>'Seo Title',
				'extraMsg'=>'',
				'display'=>'1',

		];
		$this->fieldspec['seo_keywords'] = [
				'type' =>'string',

				'pkey' => 'n',
				'hidden' =>0,
				'label'=>'Seo keywords, (list separated by comma like google,bing,yahoo',
				'extraMsg'=>'',
				'cssClass'=>'',
				'display'=>1,

		];
				$this->fieldspec['seo_description'] = [
				'type' =>'text',
				'size' =>600,
				'h' =>300,
				'pkey' => 'n',
				'hidden' =>0,
				'label'=>'Seo description',
				'extraMsg'=>'',
				'cssClass'=>'no',
				'display'=>1,
		];
		return $this->fieldspec;
	}
	
	/**
     * Get the phone record associated with the user.
     */


	public function scopePublished($query)    {

		$query->where('pub', '=',1)->where('date','<=',Carbon::now());
	}
	public function scopeTop($query)    {
		$query->where('top_menu', '=',1 )->orderBy('sort', 'asc');
	}

	public function scopeLatest($query,$limit = 5)    {

		$query->published()->take($limit)->orderBy('date', 'desc');
	}
}
