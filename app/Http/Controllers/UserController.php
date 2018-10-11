<?php

namespace App\Http\Controllers;

use App\Facades\SideMenu;
use App\Hook;
use App\User;
use App\UserAttr;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $users = User::all();
        SideMenu::build('users');
        return view('users.list', ['users' => $users]);
    }

    public function active($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if(!$user->userAttr){
            $userAttr = new UserAttr();
            $userAttr->user_id = $user->id;
            $user->userAttr= $userAttr;
        }
        $user->userAttr->active = true;
        $user->userAttr->save();

        $request->session()->flash('statusMessage', 'Active user:'.$user->name.'  success!');
        return response()->redirectToRoute('users');
    }

    public function deActive($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if(!$user->userAttr){
            return redirect()->back()->withErrors('Cannot de-active user');
        }
        $user->userAttr->active = false;
        $user->userAttr->save();

        $request->session()->flash('statusMessage', 'De-Active user:'.$user->name.' user success!');
        return response()->redirectToRoute('users');
    }

    public function activeSuperAdmin($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if(!$user->userAttr){
            $userAttr = new UserAttr();
            $userAttr->user_id = $user->id;
            $user->userAttr= $userAttr;
        }
        $user->userAttr->super_admin = true;
        $user->userAttr->save();

        $request->session()->flash('statusMessage', 'Set user:'.$user->name.' as super admin success!');
        return response()->redirectToRoute('users');
    }

    public function deActiveSuperAdmin($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if(!$user->userAttr){
            return redirect()->back()->withErrors('Cannot set user as normal user');
        }
        $user->userAttr->super_admin = false;
        $user->userAttr->save();

        $request->session()->flash('statusMessage', 'Set user:'.$user->name.' as normal user success!');
        return response()->redirectToRoute('users');
    }
}
