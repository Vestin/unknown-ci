<?php
namespace components;


use App\Components\HookRetrieveTool;
use App\Hook;
use Codeception\Util\Stub;
use Illuminate\Http\Request;

class HookRetrieveToolTest extends \Codeception\Test\Unit
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
    public function testRetrieveOne()
    {
        $HookRetrieveTool = new HookRetrieveTool();
        $request = Stub::make(Request::class,[
            'all' =>  ['token'=>'vestin','branch'=>'master'],
            'server' => ['REMOTE_ADDR'=>'172.0.0.1']
        ]);

        $res = $HookRetrieveTool->retrieve($request);
        $this->tester->assertCount(1,$res);
        $this->tester->assertInstanceOf(Hook::class,$res[0]);
    }

    // tests
    public function testRetrieveTwo()
    {
        $HookRetrieveTool = new HookRetrieveTool();
        $request = Stub::make(Request::class,[
            'all' =>  ['token'=>'vestin','branch'=>'master'],
            'server' => ['HTTP_HOST'=>'172.17.0.2']
        ]);

        $res = $HookRetrieveTool->retrieve($request);
        $this->tester->assertCount(2,$res);
        foreach($res as $hook){
            $this->tester->assertInstanceOf(Hook::class,$hook);
        }
    }

    // tests
    public function testRetrieveFail()
    {
        $HookRetrieveTool = new HookRetrieveTool();
        $request = Stub::make(Request::class,[
            'all' =>  ['token'=>'vestintoken','branch'=>'master'],
            'server' => ['REMOTE_ADDR'=>'172.0.0.1']
        ]);

        $res = $HookRetrieveTool->retrieve($request);
        $this->tester->assertNull($res);
    }
}