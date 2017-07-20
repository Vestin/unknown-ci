<?php

namespace components;


use App\Components\HookRuleParser;

class HookRuleParserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testParserCorrect()
    {
        $rawRule = <<<AAA
params.token:vestin-token\r
params.branch:master
AAA;
        $rules = HookRuleParser::parse($rawRule);
        $this->tester->assertEquals([
            'params.token' => 'vestin-token',
            'params.branch' => 'master'
        ], $rules);
    }

    // tests
    public function testParserCorrect2()
    {
        $rawRule = <<<AAA
params.token:vestin-token:d\r
params.branch:master\r
server:hah
AAA;
        $rules = HookRuleParser::parse($rawRule);
        $this->tester->assertEquals([
            'params.token' => 'vestin-token:d',
            'params.branch' => 'master',
            'server' => 'hah',
        ], $rules);
    }

    /**
     * @expectedException \App\Exceptions\HookRuleParseErrorException
     */
    public function testParserError1()
    {
        $rawRule = '';
        $rules = HookRuleParser::parse($rawRule);
    }

    /**
     * @expectedException \App\Exceptions\HookRuleParseErrorException
     */
    public function testParserError2()
    {
        $rawRule = 'params.token:';
        $rules = HookRuleParser::parse($rawRule);
    }


}