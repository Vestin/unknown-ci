<?php

namespace App\Http\Controllers;

use App\UnknownHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UnknownHookController extends Controller
{

    public function all()
    {
        $unknownHooks = UnknownHook::all();
        return View::make('unknown-hooks',['unknownHooks'=>$unknownHooks]);
    }

}
