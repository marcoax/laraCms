<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    protected $table = 'media';
    public $translatedAttributes = ['title','description'];


    public function media()
    {
        return $this->morphTo();
    }

}
