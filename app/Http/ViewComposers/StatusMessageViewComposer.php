<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/12/17
 * Time: 10:11 AM
 */

namespace App\Http\ViewComposers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusMessageViewComposer
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $view->with('statusMessage', $this->request->session()->get('statusMessage'));
    }

}