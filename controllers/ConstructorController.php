<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\BuildPart;
use app\models\Builds;
use app\models\CategoryMenu;
use app\models\Products;
use Yii;

class ConstructorController extends Controller
{
    public function actionIndex()
    {
        if (!isset($menu)){
            $menu = new CategoryMenu();
            $menu->initItems(['motherboards', 'videocards', 'processors', 'memory', 'hdd', 'psu', 'ssd', 'cases'], ['class'=>'category']);
            $menu->process([], ['visible'=>true]);
        }
        if (Yii::$app->user->isGuest)
            return $this->redirect('home/login');
        $products = Products::find()->all();
        return $this->render('index', compact(/*'build',*/'products', 'menu'));
    }

    public function actionAdd()
    {
        $arr = Yii::$app->request->post('arr');
        $arr = explode(',', $arr);

        $build = new Builds();
        $build->build_name = 'test';
        $build->url_photo = 'logo.png';
        $build->is_allowed = false;
        $build->user_id = Yii::$app->user->identity->id;
        $build->save();

        foreach ($arr as $index) {
            $parts = new BuildPart();
            $parts->product_id = $index;
            $parts->build_id = Builds::getLastId();
            $parts->save();
        }
        
    }

    public function actionGetProduct($id = null)
    {
        if ($id != null) {
            return $this->asJson(Products::findIdentity($id));
        }
    }
}
