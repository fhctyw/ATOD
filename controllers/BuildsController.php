<?php

namespace app\controllers;

use app\models\Builds;
use app\models\Builds_part;
use app\models\Products;
use yii\web\Controller;
use app\models\Characteristics;
use Yii;

class BuildsController extends Controller {
    public function actionIndex() 
    {
        $id = Yii::$app->request->get('id');
        $build = Builds::findIdentity($id);
        foreach($build->parts as $part)
        {
            $characteristics = Characteristics::find()->where(['product_id' => $part->product_id])->all();
        }
    return $this->render('index',compact('build', 'characteristics'));
    }
}
?>