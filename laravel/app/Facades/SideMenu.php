<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/18/17
 * Time: 2:08 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class SideMenu extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'SideMenu';
    }

}