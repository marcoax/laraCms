<?php

namespace App;

use App\Events\Registration\NewsletterSubscribe;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected   $fillable = ['email','pub'];

    /**
     * @param $email
     * @return static
     */
    static  public  function  addToDefaultList($email){
        $attributes = array();
        $attributes['email'] = $email;
        $newsletter = static::create($attributes);
        //send notification
        event( new NewsletterSubscribe($newsletter) );
        return $newsletter;
    }
}
