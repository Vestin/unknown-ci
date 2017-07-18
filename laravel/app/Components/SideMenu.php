<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/18/17
 * Time: 10:57 AM
 */

namespace App\Components;


use App\Exceptions\SideMenuException;

class SideMenu
{

    public $collection = [];

    public $menu = [];

    public function register($name, callable $callable)
    {
        $this->collection[$name] = $callable;
    }

    public function render($name, ... $args)
    {
        $menu = $this->composer($name, ... $args);
        return view('side-menu', ['menu' => $menu]);
    }

    public function build($name, ...$args)
    {
        $menu = $this->composer($name, ...$args);
        view()->share('sideMenu', $menu);
    }

    /**
     * @param $name
     * @param array ...$args
     * @return array menu view data
     * @throws SideMenuException
     */
    public function composer($name, ... $args)
    {
        if (!array_key_exists($name, $this->collection)) {
            throw SideMenuException::menuNotDefined($name);
        }

        array_unshift($args, $this);
        call_user_func_array($this->collection[$name], $args);
        return $this->retrieveAndFlush();
    }

    public function push($itemName, $itemUrl = null)
    {
        $this->menu[] = [
            'name' => $itemName,
            'url' => $itemUrl,
        ];
    }

    public function retrieveAndFlush()
    {
        $menu = $this->menu;
        $this->menu = [];
        return $menu;
    }

}