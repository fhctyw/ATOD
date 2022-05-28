<?php
namespace models;

use app\models\Products;
use Codeception\Util\Debug;

class ProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetProduct()
    {
        $model = Products::findIdentity(1);
        $this->assertNotEmpty($model);
    }

    public function testCheckData()
    {
        $model = Products::findIdentity(1);
        Debug::debug($model);
        $id = 1;
        $product_name = 'Материнська плата Asus Prime H510M-A (s1200, Intel H510, PCI-Ex16)';
        $url_photo = 'https://content2.rozetka.com.ua/goods/images/big/134657269.jpg';
        $price = 2379;
        $url_site = 'https://hard.rozetka.com.ua/ua/asus_prime_h510m_a/p277908328/';
        $this->assertEquals($model->product_id, $id);
        $this->assertEquals($model->product_name, $product_name);
        $this->assertEquals($model->url_photo, $url_photo);
        $this->assertEquals($model->price, $price);
        $this->assertEquals($model->url_site, $url_site);
        
    }
}