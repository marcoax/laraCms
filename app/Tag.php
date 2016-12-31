<?php
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    public    $translatedAttributes = ['title'];
    public    $sluggable = ['slug'];
    protected $fillable  = ['title','slug'];
    protected $fieldspec = [];

    // set the specifications for this database table
    function getFieldSpec ()
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
        $this->fieldspec['title']   = [
            'type' =>'string',
            'required' =>true,
            'hidden' => '0',
            'label'=>'Title',
            'extraMsg'=>'',
            'display'=>'1',
        ];
        $this->fieldspec['slug'] = [
            'type' =>'string',
            'required' => 'n',
            'hidden' =>0,
            'label'=>'Slug',
            'extraMsg'=>'',
            'display'   =>  1,
        ];
        return $this->fieldspec;
    }
    /*
     * Get news  associates with the tags
     * Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function news(){

        return $this->belongsToMany('App\News');

    }


}
