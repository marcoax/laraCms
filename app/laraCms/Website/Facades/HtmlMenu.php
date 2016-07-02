<?php
/**
 * Created by PhpStorm.
 * User: n0impossible
 * Date: 6/14/15
 * Time: 1:47 PM
 */

namespace App\laraCms\Website\Facades;
use Illuminate\Support\Facades\Facade;

class HtmlMenu extends Facade{
    protected static function getFacadeAccessor() { return 'HtmlMenu'; }
}