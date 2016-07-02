<?php namespace App\laraCms\SeoTools;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use SEO;

/**
 * Class laraCmsSeoTrait
 *
 *
 */
trait laraCmsSeoTrait
{


    protected $title;
    protected $image;
    protected $model;
    protected $url;

    public static function bootlaraCmsSeoTrait()
    {
        static::created(function($item){
            // Index the item
        });
    }

    public function setSeo($model)
    {
        $this->model = $model;
        $this->setTitle();
        $this->setDescription();
        $this->setOpenGraphImages();
    }

    public function setTitle()
    { 
        $this->title = ucfirst( strtolower($this->tagHandler('title') ) ); 
        SEO::setTitle($this->title);
    }

     public function setDescription()
    {
         SEO::setDescription($this->tagHandler('description'));

    }

    public function setCanonical()
    {

        SEO::setCanonical($this->url);
    }

    public function setOpenGraphImages()
    {
        $this->image = ($this->model->image)?ma_get_image_from_repository($this->model->image):asset('public/website/images/logo.jpg');
        $this->addOpenGraphProperty('images', $this->image);
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
