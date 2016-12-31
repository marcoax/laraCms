<?php namespace App\LaraCms\Sluggable;


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

	public function sluggy(Model $model, $value)
    {
        $this->value = $value;

		$count = 0;

        $slug = ($this->value == '') ? str_slug($model->title) : str_slug($this->value);
        if ($model->id != '') {
			if ($model::where('slug', $slug)->where('id', '!=', $model->id)->count()) {
				$count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $model->id)->count();
			}
		}
        else {
			if ($model::where('slug', $slug)->count()) {
				$count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
			}
		}
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public static function bootSluggableTrait()
    {
        static::created(function($item){
            // Index the item
        });
    }
}
