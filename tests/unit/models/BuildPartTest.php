<?php
namespace models;

use Yii;
use app\models\BuildPart;

use Codeception\Util\Debug;

class BuildPartTest extends \Codeception\Test\Unit
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

    //test

    public function testGetBuildPart()
    {
        $model = BuildPart::findIdentity(1);
        $this->assertNotEmpty($model);
    }

    public function testCheckData()
    {
        $model = BuildPart::findIdentity(1);
        //Debug::debug($model);
        $build_id = 1;
        $product_id = 1;
        $this->assertEquals($model->build_id, $build_id);
        $this->assertEquals($model->product_id, $product_id);
    }
}