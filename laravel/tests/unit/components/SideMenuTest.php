<?php
namespace components;


use App\Components\SideMenu;

class SideMenuTest extends \Codeception\Test\Unit
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

    /**
     * @expectedException \App\Exceptions\SideMenuException
     */
    public function testRenderSideMenuNotFound()
    {
        $sideMenu = new SideMenu();
        $sideMenu->register('home',function($sideMenu,string $b){
            $sideMenu->push('baidu','http://www.baidu.com');
            $sideMenu->push('google','http://www.google.com');
            $sideMenu->push('diy',$b);
        });
        //$this->assertEquals([],$sideMenu->collection);
        $sideMenu->render('name','http://dota2.com');
    }

    // tests
    public function testRenderSideMenu()
    {
        $sideMenu = new SideMenu();
        $sideMenu->register('home',function($sideMenu,string $b){
             $sideMenu->push('baidu','http://www.baidu.com');
             $sideMenu->push('google','http://www.google.com');
             $sideMenu->push('diy',$b);
        });
        //$this->assertEquals([],$sideMenu->collection);
        $menu = $sideMenu->render('home','http://dota2.com');
        $this->tester->assertStringStartsWith('    <style>',$menu->render());
    }
}