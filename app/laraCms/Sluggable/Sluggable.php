<?php namespace App\laraCms\Sluggable;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


/**
 * Class SluggableTrait
 *
 *
 */
trait SluggableTrait
{

    protected $value;

    public function sluggy(Model $model,$value)
    {
        $this->value = $value;

        $slug = ($this->value=='')? str_slug($model->title) :str_slug($this->value);
        if( $model->id!='') $count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $model->id)->count();
        else $count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public static function bootSluggableTrait()
    {
        static::created(function($item){
            // Index the item
        });
    }
}
