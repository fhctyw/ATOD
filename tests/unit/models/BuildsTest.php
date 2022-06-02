<?php
namespace models;

use Yii;
use app\models\Builds;
use Codeception\Util\Debug;

class BuildsTest extends \Codeception\Test\Unit
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

    public function testGetBuild()
    {
        $model = Builds::findIdentity(1);
        $this->assertNotEmpty($model);
    }

    public function testCheckData()
    {
        $model = Builds::findIdentity(1);
        Debug::debug($model);
        $build_id = 1;
        $is_allowed = 'no';
        $user_id = 1;
        $build_name = 'terminator';
        $url_photo = 'logo.png';
        $this->assertEquals($model->build_id, $build_id);
        $this->assertEquals($model->build_name, $build_name);
        $this->assertEquals($model->is_allowed, $is_allowed);
        $this->assertEquals($model->user_id, $user_id);
        $this->assertEquals($model->url_photo, $url_photo);
    }
}