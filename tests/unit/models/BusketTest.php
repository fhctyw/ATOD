<?php
namespace models;

use Yii;
use app\models\Busket;
use app\models\Products;
use Codeception\Util\Debug;

class BusketTest extends \Codeception\Test\Unit
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
    public function testCheckSessionAfterAdd()
    {
        $busket = new Busket();
        $busket->addToBusket(Products::findIdentity(1));
        $this->assertNotEmpty($_SESSION);
        $this->assertEquals($_SESSION['busket.sum'], 2379);
    }
}