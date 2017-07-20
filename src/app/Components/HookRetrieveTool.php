<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/20/17
 * Time: 10:54 AM
 */

namespace App\Components;

use App\Hook;
use Illuminate\Http\Request;

class HookRetrieveTool
{
    /**
     * @param Request $request
     * return null|App\Hook
     */
    public function retrieve(Request $request)
    {
        $hooks = Hook::where('active', Hook::ACTIVE_ON)->get();
        $requestRules = [
            'params' => (array)$request->all(),
            'server' => (array)$request->server(),
        ];

        $retrievedHooks = [];
        foreach ($hooks as $hook) {
            $rules = json_decode($hook->rules, true);
            $pass = true;
            foreach ($rules as $key => $value) {
                $keyArr = explode('.', $key);
                $singleRule = $requestRules;
                $success = true;
                foreach ($keyArr as $itemKey) {
                    if (isset($singleRule[$itemKey])) {
                        $singleRule = $singleRule[$itemKey];
                        continue;
                    }
                    $success = false;
                    break;
                }
                if (!$success || $singleRule != $value) {
                    $pass = false;
                    break;
                }
            }
            if ($pass) {
                $retrievedHooks[] = $hook;
            }
        }

        return empty($retrievedHooks) ? null : $retrievedHooks;
    }
}