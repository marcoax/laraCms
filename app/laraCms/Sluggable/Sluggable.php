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
    public function sluggy($query)
    {
        // ...
    }

    public static function bootSluggableTrait()
    {
        static::created(function($item){
            // Index the item
        });
    }
}
