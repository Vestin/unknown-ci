<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/14/17
 * Time: 2:44 PM
 */

namespace App\ViewModels;


use App\Exceptions\ViewModelNotFoundException;

trait ViewModelTrait
{

    public $viewModel;

    public function initViewModel()
    {
        $class = substr(get_class($this), stripos(get_class($this), '\\') + 1);
        $targetViewClass = 'App\\ViewModels\\' . $class . 'ViewModel';
        if (!class_exists($targetViewClass)) {
            throw ViewModelNotFoundException::formModel($this, $targetViewClass);
        }
        $this->viewModel = new $targetViewClass($this);
    }
}