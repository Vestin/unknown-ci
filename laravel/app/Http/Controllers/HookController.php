<?php

namespace App\Http\Controllers;

use App\Components\HookRetrieveTool;
use App\Components\HookRuleParser;
use App\Events\TriggerHookEvent;
use App\Exceptions\HookRuleParseErrorException;
use App\Facades\SideMenu;
use App\Hook;
use App\Project;
use App\UnknownHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class HookController extends Controller
{

    public function all()
    {
        $hooks = Hook::all();
        SideMenu::build('hooks');
        return view('hooks.list', ['hooks' => $hooks]);
    }

    public function detector(Request $request)
    {
        //check && trigger build
        $hooks = (new HookRetrieveTool())->retrieve($request);
        if ($hooks !== null) {
            foreach ($hooks as $hook) {
                $triggerHookEvent = new TriggerHookEvent($hook);
                event($triggerHookEvent);
            }
            return response('success', 200);
        }


        // save unknown hook
        $unknownHook = new UnknownHook();
        $unknownHook->request = json_encode([
            'params' => $request->all(),
            'server' => $request->server(),
        ]);
        $unknownHook->save();

        return response('success', 200);
    }

    public function createPage($unknown_hook_id)
    {
        $unknownHook = UnknownHook::findOrFail($unknown_hook_id);

        SideMenu::build('hooks');
        return view('hooks.create', ['unknownHook' => $unknownHook]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:hooks|min:5|max:255',
            'description' => 'required|min:5|max:255'
        ]);
        $rawRule = $request->input('rule');

        try {
            $rules = HookRuleParser::parse($rawRule);
            $hook = new Hook();
            $hook->name = $request->input('name');
            $hook->description = $request->input('description');
            $hook->rules = json_encode($rules);
            $hook->parser = 'json';
            $hook->save();

            $request->session()->flash('statusMessage', 'Hook create successful!');

            return response()->redirectToRoute('hook.edit', [$hook->id]);
        } catch (HookRuleParseErrorException $e) {
            return Redirect::back()->withErrors([$e->getMessage()]);
        }
    }

    public function edit($hook_id, Request $request)
    {
        $hook = Hook::findOrFail($hook_id);
        if ($request->isMethod('get')) {
            $projects = Project::all();
            SideMenu::build('hook', $hook);
            return view('hooks.edit', ['hook' => $hook, 'projects' => $projects]);
        }

        $this->validate($request, [
            'name' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('hooks')->ignore($hook_id),
            ],
            'description' => 'required|min:5|max:255',
            'projects' => 'array'
        ]);
        $rawRule = $request->input('rule');

        try {
            $rules = HookRuleParser::parse($rawRule);
            $hook->name = $request->input('name');
            $hook->description = $request->input('description');
            $hook->rules = json_encode($rules);
            $hook->parser = 'json';
            $hook->save();

            $hook->projects()->detach();
            $hook->projects()->attach($request->input('projects'));

            $request->session()->flash('statusMessage', 'Hook update successful!');

            return response()->redirectToRoute('hook.detail', [$hook->id]);
        } catch (HookRuleParseErrorException $e) {
            return Redirect::back()->withErrors([$e->getMessage()]);
        }

    }

    public function detail($hook_id)
    {
        $hook = Hook::findOrFail($hook_id);
        SideMenu::build('hook', $hook);
        return view('hooks.detail', ['hook' => $hook]);
    }

    public function active($hook_id, Request $request)
    {
        $hook = Hook::findOrFail($hook_id);
        $hook->active();
        $request->session()->flash('statusMessage', 'Hook Active Successful!');
        return response()->redirectToRoute('hook.detail', [$hook_id]);
    }

    public function deActive($hook_id, Request $request)
    {
        $hook = Hook::findOrFail($hook_id);
        $hook->deActive();
        $request->session()->flash('statusMessage', 'Hook De-Active Successful.');
        return response()->redirectToRoute('hook.detail', [$hook_id]);
    }
}
