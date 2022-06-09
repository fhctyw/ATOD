<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\BuildPart;
use app\models\Builds;
use app\models\BuildsForm;
use app\models\CategoryMenu;
use app\models\Products;
use Exception;
use Yii;
use yii\helpers\Url;

class ConstructorController extends Controller
{
    public $menu;

    public function init()
    {
        parent::init();
        $this->menu = new CategoryMenu();
        $this->menu->initItems([['Материнські плати', 'motherboards'], ['Відеокарти','videocards'], ['Процесори','processors'], ['Пам`ять','memory'], ['Накопичувачі HDD','hdd'], ['Блоки живлення','psu'], ['Накопичувачі SSD','ssd'], ['Корпуси','cases']], [], ['style'=>'display:none;']);
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest)
            return $this->redirect('home/login');

        $builds_form = new BuildsForm();

        return $this->render('index', ['menu' => $this->menu, 'products' => $this->menu->products, 'builds' => $builds_form]);
    }

    public function actionProcess()
    {
        $post = Yii::$app->request->post('arr');
        if ($post)
        {
            $this->menu->process($post['arr']);
        }
        else
            throw new Exception(var_export(Yii::$app->request->post(), true));
    }

    public function actionPostBuild()
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            
            if ($post['arr'] && $post['build_name']) {
                
                $a = explode(',', $post['arr']);

                $build = new Builds();
                $build->build_name = $post['build_name'];
                $build->url_photo = 'logo.png';
                $build->is_allowed = false;
                $build->user_id = Yii::$app->user->identity->id;
                $build->save();

                foreach ($a as $index) {
                    $parts = new BuildPart();
                    $parts->product_id = $index;
                    $parts->build_id = Builds::getLastId();
                    $parts->save();
                }
                return $this->redirect('../builds?id=' . $build->build_id);
            }
            else 
                throw new Exception(var_export($post, true));
            return $this->render('test');
        }
    }

    public function actionTest()
    {
        $json = $this->menu->getConfigByCategory('motherboards');
        var_dump($json);
        die;
        return $this->render('test');
    }

    /* public function actionAdd()
    {
        $arr = Yii::$app->request->post('arr');
        $arr = explode(',', $arr);
        return $this->actionPostBuild($arr);
    } */

    public function actionGetProduct($id = null)
    {
        if ($id != null) {
            return $this->asJson(Products::findIdentity($id));
        }
    }
}
