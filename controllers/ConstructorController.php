<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\BuildPart;
use app\models\Builds;
use app\models\Products;
use Exception;
use Yii;

class ConstructorController extends Controller
{
    public $main_build;

    public function actionIndex()
    {
        $products = Products::find()->all();
        return $this->render('index', compact(/*'build',*/'products'));
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
