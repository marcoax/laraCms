<?php namespace App\LaraCms\SeoTools;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use SEO;
use Request;

/**
 * Class laraCmsSeoTrait
 *
 *
 */
trait LaraCmsSeoTrait
{
    protected $title;
    protected $image;
    protected $model;
    protected $url;

    public static function bootLaraCmsSeoTrait()
    {
        static::created(function($item){
            // Index the itemcompo
        });
    }

    public function setSeo($model)
    {
        $this->model = $model;
        $this->setTitle();
        $this->setDescription();
        $this->setOpenGraphImages();
        $this->setCanonical();
    }

    public function setTitle()
    {
        $this->title = $this->tagHandler('title');
        SEO::setTitle($this->title);
    }

     public function setDescription()
    {
         SEO::setDescription( str_limit( $this->tagHandler('description'), 150 ) );

    }

    public function setCanonical()
    {
        $this->url = Request::url();
        SEO::setCanonical($this->url);
    }

    public function setOpenGraphImages()
    {
        $this->image = ($this->model->image!='')?ma_get_image_from_repository($this->model->image):asset('public/website/images/logo.jpg');
        SEO::opengraph()->addImage($this->image);
    }

    public function addOpenGraphProperty($property,$value)
    {
        SEO::opengraph()->addProperty($property,$value);
    }
    protected function tagHandler($tag)
    {

        return ($this->model->{'seo_'.$tag}!='')?$this->model->{'seo_'.$tag}:$this->model->{$tag};

    }
}
