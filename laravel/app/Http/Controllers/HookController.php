<?php

namespace App\Http\Controllers;

use App\Facades\SideMenu;
use App\UnknownHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HookController extends Controller
{

    public function all()
    {
        SideMenu::build('hooks');
        return view('hooks.list');
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

    public function createPage($unknownHookId)
    {
        $unknownHook = UnknownHook::findOrFail($unknownHookId);

        SideMenu::build('hooks');

        return view('hooks.create', ['unknownHook' => $unknownHook]);
    }

    public function create()
    {

    }

}
