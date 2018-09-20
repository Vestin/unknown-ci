<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/14/17
 * Time: 2:28 PM
 */

namespace App\ViewModels;


use Illuminate\Database\Eloquent\Model;

class ViewModel
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ViewModel constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * is utilized for reading data from inaccessible members.
     *
     * @param $name string
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    function __get($name)
    {
        $method = 'get'.$name;
        if(method_exists($this,$method)){
            return $this->$method();
        }
        return $this->model->$name;
    }


}