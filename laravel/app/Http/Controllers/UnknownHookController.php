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
        return View::make('unknown-hook.list', ['unknownHooks' => $unknownHooks]);
    }

    public function clear(Request $request)
    {
        UnknownHook::destroy(UnknownHook::all()->modelKeys());
        $request->session()->flash('statusMessage', 'Delete successful!');
        return response()->redirectToRoute('unknown.hooks');
    }

    public function detail($id)
    {
        $unknownHook = UnknownHook::findOrFail($id);
        return View::make('unknown-hook.detail',['unknownHook'=>$unknownHook]);
    }

}
