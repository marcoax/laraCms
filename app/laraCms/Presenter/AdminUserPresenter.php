<?php

namespace App\LaraCms\Presenter;
/**
 * Created by PhpStorm.
 * User: web01
 * Date: 13/10/16
 * Time: 10:25
 */
trait AdminUserPresenter
{
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}