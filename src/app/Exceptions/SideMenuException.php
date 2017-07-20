<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/18/17
 * Time: 11:23 AM
 */

namespace App\Exceptions;


class SideMenuException extends \Exception
{

    static public function menuNotDefined($name)
    {
        return new static('Menu: '.$name.' is not defined. pls define menu in your sidemenu service provider');
    }

}