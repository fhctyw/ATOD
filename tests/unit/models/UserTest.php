<?php 

namespace tests\unit\models;

use app\models\User;
use Codeception\Lib\Console\Output; 

class UserTest extends \Codeception\Test\Unit
{
    public function _after()
    {
        
    }

    public function testGetUserById()
    {
        $user = User::findById(1);
        $this->assertNotEmpty($user);
    }

    public function testFindIdentity()
    {
        $user = User::findIdentity(1);
        $this->assertNotEmpty($user);
    }

    public function testFindByName()
    {
        $user = User::findByUsername('test');
    }
}

?>