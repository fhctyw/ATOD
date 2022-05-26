<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\BuildPart;
use app\models\Builds;

class ConstructorController extends Controller
{
    public function actionIndex($id = null)
    {
        if ($id != null){
            $build = Builds::findIdentity($id);
        }
        return $this->render('index', compact('build'));
    }
}

?>