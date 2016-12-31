<?php
/**
 * Created by PhpStorm.
 * User: n0impossible
 * Date: 6/14/15
 * Time: 1:47 PM
 */

namespace App\LaraCms\Admin\Facades;
use Illuminate\Support\Facades\Facade;

class AdminList extends Facade{
    protected static function getFacadeAccessor() { return 'AdminList'; }
}