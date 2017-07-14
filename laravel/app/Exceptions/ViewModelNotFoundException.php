<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/14/17
 * Time: 2:47 PM
 */

namespace App\Exceptions;


class ViewModelNotFoundException extends \Exception
{

    static public function formModel($model, $targetViewClass)
    {
        throw new static('Model:' . get_class($model) . '; ViewModel:' . $targetViewClass);
    }

}