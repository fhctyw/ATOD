<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\BuildPart;
use app\models\Builds;
use app\models\Products;
use Yii;

class ConstructorController extends Controller
{
    public $main_build;

    public function actionIndex($id = null)
    {
        $products = Products::find()->all();
        if ($id != null) {
            $build = Builds::findIdentity($id);
        }
        else
        {
            
        }
        return $this->render('index', compact('build', 'products'));
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost())
        {
            echo 'test';
        }
    }

    public function actionGetProduct($id = null)
    {
        if ($id != null)
        {
            return $this->asJson(Products::findIdentity($id));
        }
    }
}

?>