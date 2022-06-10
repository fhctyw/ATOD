<?php
namespace models;

use Yii;
use app\models\CheckboxList;
use Codeception\Util\Debug;

class CheckBoxListTest extends \Codeception\Test\Unit
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

    public function testCheck()
    {
        $model = new CheckboxList();
        $model->categories = ['motherboards', 'videocards']; 
        $this->assertNotEmpty($model);
    }
}