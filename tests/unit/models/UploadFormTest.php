<?php
namespace models;

use Yii;
use app\models\UploadForm;
use app\models\User;
use Codeception\Util\Debug;

class UploadFormTest extends \Codeception\Test\Unit
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

    public function testupload()
    {
        $model = User::findById(1);
        $user_id = 1;
        $user_photo = 'roma.png';
        $this->assertEquals($model->id, $user_id);
        $this->assertEquals($model->url_photo, $user_photo);
    }
}