<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 */
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
	public     $translatedAttributes	= ['title','description','seo_title','seo_keywords','seo_description'];
	/**
	 * @var array
     */
	public     $sluggable				= ['slug'];
	/**
	 * @var array
     */
	protected  $fillable				= ['title','description','date','slug','sort','pub'];
	/**
	 * @var array
     */
	protected  $fieldspec				= [];

	/**
	 * @return mixed
     */
	public function media()
	{
		return $this->morphMany('App\Media', 'model')->orderBy('sort');
	}

	/**
	 * @param $value
     */
	public function setDateAttribute($value)
	{
		$this->attributes['date'] = Carbon::parse($value);
	}

	/**
	 * @param $value
	 * @return string
     */
	public function getDateAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}

	/**
	 * @return string
     */
	public function getFormattedDate()
	{
  		return Carbon::parse($this->attributes['date'])->formatLocalized('%d %B %Y');
	}

	/**
	 * @return array
     */
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
		$this->fieldspec['date'] = [
			'type'      =>'date',
			'required'  => 1,
			'hidden'    => '0',
			'label'     => 'Publish date',
			'extraMsg'  => '',
			'display'   =>  '1',
			'cssClass'  => 'datepicker',
			'cssClassElement' => 'col-sm-2',
		];
		$this->fieldspec['title'] = [
			'type'      =>'string',
			'required'  => true,
			'hidden'    => '0',
			'label'     => 'Title',
			'extraMsg'  => '',
			'display'   => '1',
		];
		$this->fieldspec['slug'] = [
			'type'      => 'string',
			'required'  => true,
			'hidden'    => 0,
			'label'     => 'Slug',
			'extraMsg'  => '',
			'display'   =>  1,
		];
		$this->fieldspec['description'] = [	
			'type'      => 'text',
			'size'      => 600,
			'h'         => 300,
			'required'  => true,
			'hidden'    => 0,
			'label'     => 'Description',
			'extraMsg'  => '',
			'cssClass'  => 'ckeditor',
			'display'   => 1,
		];
		$this->fieldspec['tag'] = [
            'type'       	=> 'relation',
            'model'      	=> 'Tag',
            'relation_name' => 'tags',
            'foreign_key'   => 'id',
			'label_key'     => 'title',
			'label'         => 'Tags',
            'required'      => true,
			'display'       => '1',
            'hidden'        => false,
			'multiple'      => true,
		];
		$this->fieldspec['link'] = [
			'type'      => 'string',
			'size'      => 600,
			'required'  => true,
			'hidden'    => 0,
			'label'     => 'External url',
			'extraMsg'  => '',
			'display'=>0,
		];
		$this->fieldspec['image'] = [
			'type'      =>'media',
			'required'  => true,
			'hidden'    => 0,
			'label'     => 'Image',
			'extraMsg'  => '',
			'extraMsgEnabled'=>'Code',
			'mediaType' => 'Img',
			'display'   => 1,
		];
		$this->fieldspec['doc'] = [	
			'type'      =>'media',
			'required'  =>'n',
			'hidden'    => 0,
			'label'     =>'Document',
			'extraMsg'  => '',
			'lang'      => 0,
			'mediaType' => 'Doc',
			'display'   => 0,
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
        $this->fieldspec['seo_title'] = [
            'type'     => 'string',
            'required' => 'n',
            'hidden'   => '0',
            'label'    => trans('admin.seo.title'),
            'extraMsg' => '',
            'display'  => '1',
        ];
        $this->fieldspec['seo_keywords'] = [
            'type'     => 'string',
            'hidden'   => 0,
            'label'    => trans('admin.seo.keywords').'<br>'.trans('admin.seo.keywords_eg_list'),
            'extraMsg' => '',
            'cssClass' => '',
            'display'  => 1,
        ];
        $this->fieldspec['seo_description'] = [
            'type'     => 'text',
            'size'     => 600,
            'h'        => 300,
            'hidden'   => 0,
            'label'    => trans('admin.seo.description'),
            'extraMsg' => '',
            'cssClass' => 'no',
            'display'  => 1,
        ];
        $this->fieldspec['seo_no_index'] = [
            'type'     => 'boolean',
            'required' => false,
            'hidden'   => '0',
            'label'    => trans('admin.seo.no-index'),
            'display'  => '1'
        ];
	    return $this->fieldspec;
	}
	/**
	 * Many-to-Many relations with Tag.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	/**
	 * @param $values
     */
	public function saveTags($values)
	{
		if(!empty($values))
		{
			$this->tags()->sync($values);
		} else {
			$this->tags()->detach();
		}
	}

	/**
	 * @param $query
	 * @param int $limit
     */
	public function scopeLatest($query, $limit = 5)    {
		$query->where('pub',1)->take($limit)->orderBy('date', 'desc');
	}

}