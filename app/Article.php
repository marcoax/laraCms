<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Dimsav\Translatable\Translatable;

    /**
     * Attributes that can be translated.
     *
     * @var array
     */
    public $translatedAttributes = ['menu_title', 'title', 'subtitle', 'abstract', 'description', 'seo_title', 'seo_keywords', 'seo_description', 'seo_no_index'];

    /**
     * Attributes that can be 'slugged'.
     *
     * @var array
     */
    public $sluggable = ['slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'abstract', 'description', 'slug', 'sort', 'pub', 'top_menu', 'id_parent', 'link', 'template_id'];

    /**
     * The list of fields to build the edit/new form.
     *
     * @var array
     */
    protected $fieldspec = [];

    /**
     * Accessibility roles for searches.
     *
     * @var array
     */
    public $ajaxAccessibilityRoles = ['su'];

    /**
     * The Domain relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo('App\Domain', 'template_id', 'id');
    }

    /**
     * The Media relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function media()
    {
        return $this->morphMany('App\Media', 'model');
    }

    /**
     * The Article relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentPage()
    {
        return $this->hasOne('App\Article','id','id_parent');
    }

    /**
     * Set the specifications for this database table.
     *
     * @return array
     */
    function getFieldSpec()
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
        $this->fieldspec['id_parent'] = [
            'type'        => 'relation',
            'model'       => 'article',
            'foreign_key' => 'id',
            'label_key'   => 'title',
            'required'    => false,
            'label'       => 'Parent Page',
            'hidden'      => '0',
            'display'     => '1',
        ];
        $this->fieldspec['template_id'] = [
            'type'        => 'relation',
            'model'       => 'Domain',
            'filter'      => ['domain' => 'template'],
            'foreign_key' => 'id',
            'label_key'   => 'title',
            'required'    => false,
            'label'       => 'Template',
            'hidden'      => '0',
            'display'     => '1',
        ];
        $this->fieldspec['menu_title'] = [
            'type'     => 'string',
            'required' => false,
            'hidden'   => 0,
            'label'    => 'Menu Title',
            'extraMsg' => '',
            'display'  => 1,
        ];
        $this->fieldspec['title'] = [
            'type'     => 'string',
            'required' => '1',
            'hidden'   => '0',
            'label'    => 'Page Title',
            'extraMsg' => '',
            'display'  => '1',
        ];
        $this->fieldspec['subtitle'] = [
            'type'     => 'string',
            'required' => false,
            'hidden'   => '0',
            'label'    => 'Subtitle',
            'extraMsg' => '',
            'display'  => '1',
        ];
        $this->fieldspec['slug'] = [
            'type'     => 'string',
            'required' => '1',
            'hidden'   => 0,
            'label'    => 'Slug',
            'extraMsg' => '',
            'display'  => 1,
        ];
        $this->fieldspec['description'] = [
            'type'     => 'text',
            'size'     => 600,
            'h'        => 300,
            'required' => 'n',
            'hidden'   => 0,
            'label'    => 'Description',
            'extraMsg' => '',
            'cssClass' => 'ckeditor',
            'display'  => 1,
        ];
        $this->fieldspec['abstract'] = [
            'type'     => 'text',
            'size'     => 600,
            'h'        => 100,
            'required' => 'n',
            'hidden'   => 0,
            'label'    => 'Abstract or text right side column',
            'extraMsg' => '',
            'cssClass' => 'ckeditor',
            'display'  => 1,
        ];
        $this->fieldspec['link'] = [
            'type'     => 'string',
            'required' => false,
            'hidden'   => 0,
            'label'    => 'External url',
            'extraMsg' => '',
            'display'  => 1,
        ];
        $this->fieldspec['image'] = [
            'type'      => 'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => 'Image',
            'extraMsg'  => '',
            'mediaType' => 'Img',
            'display'   => 1,
        ];
        $this->fieldspec['doc'] = [
            'type'      => 'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => 'Document',
            'extraMsg'  => '',
            'lang'      => 0,
            'mediaType' => 'Doc',
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
        $this->fieldspec['top_menu'] = [
            'type'     => 'boolean',
            'required' => false,
            'hidden'   => '0',
            'label'    => trans('admin.label.top_menu'),
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

    public function scopePublished($query)
    {
        $query->where('pub', '=', 1);
    }

    public function scopeTop($query)
    {
        $query->where('top_menu', '=', 1)->where('id_parent', '=', 1)->orderBy('sort', 'asc');
    }

    public function scopeChildren($query, $id = '')
    {
        $query->where('id_parent', '=', $id)->orderBy('sort', 'asc');
    }

    public function scopeChildrenMenu($query, $id)
    {
        $query->where('id_parent', '=', $id)->where('top_menu', '=', 1)->orderBy('sort', 'asc');
    }
}