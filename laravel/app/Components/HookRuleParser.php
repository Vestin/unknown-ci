<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/19/17
 * Time: 10:55 AM
 */

namespace App\Components;


use App\Exceptions\HookRuleParseErrorException;

class HookRuleParser
{

    static public function parse($rawRule)
    {
        $rawRuleArr = explode("\r\n", $rawRule);
        if (empty($rawRuleArr) || empty($rawRuleArr[0])) {
            throw new HookRuleParseErrorException('Rules can not empty.');
        }

        $rules = [];
        foreach ($rawRuleArr as $singleRuleString) {
            $singleRuleArr = explode(':', $singleRuleString, 2);

            if (count($singleRuleArr) != 2 || empty($singleRuleArr[0]) || empty($singleRuleArr[1])) {
                throw new HookRuleParseErrorException('Rule: \'' . $singleRuleString . '\' is not valid.');
            }

            $rules[$singleRuleArr[0]] = $singleRuleArr[1];
        }

        return $rules;

    }

}