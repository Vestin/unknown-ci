<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/14/17
 * Time: 4:00 PM
 */

namespace App\ViewModels;


class HookViewModel extends ViewModel
{

    public function getRules()
    {
        return json_decode($this->model->rules, true);
    }

    public function getActive()
    {
        return $this->model->active?'active':'not active';
    }

}