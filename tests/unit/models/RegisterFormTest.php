<?php
namespace models;

use Yii;
use app\models\User;
use app\models\RegisterForm;
use Codeception\Util\Debug;

class RegisterFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    
    protected function _before()
    {
        
    }

    protected function _after()
    {
        
        Yii::$app->user->logout();
    }
    
    public function testRegister()
    {
        $model = new RegisterForm([
            'name' => 'testname',
            'email'=>'test@test.com',
            'password' => 'testpassword',
        ]);
        
        $this->assertTrue($model->register());
        $this->assertNotTrue(\Yii::$app->user->isGuest);
    }

    public function testNotRegister()
    {
        $model = new RegisterForm([
            'name' => 'test',
            'email'=>'testtest.com',
            'password' => 'testpassword',
        ]);
        
        $this->assertNotTrue($model->register());
        $this->assertArrayHasKey('name', $model->getErrors());
    }

}