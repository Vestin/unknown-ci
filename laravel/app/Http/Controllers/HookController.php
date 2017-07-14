<?php

namespace App\Http\Controllers;

use App\UnknownHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HookController extends Controller
{

    public function all()
    {
        return View::make('hooks');
    }

    public function detector(Request $request)
    {
        //check

        // save unknown hook
        $unknownHook = new UnknownHook();
        $unknownHook->request = json_encode([
            'params' => $request->all(),
            'server' => $request->server(),
        ]);
        $unknownHook->save();

        return response('success', 200);
    }

}
