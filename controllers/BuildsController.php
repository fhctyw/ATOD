<?php

namespace app\controllers;

use app\models\Builds;
use app\models\Builds_part;
use app\models\Products;
use yii\web\Controller;
use Yii;

class BuildsController extends Controller {
    public function actionIndex() 
    {
        $id = Yii::$app->request->get('id');
        $product = Builds::findByBuildId($id);
        //$characteristics = Characteristics::find()->where(['product_id' => $id])->all();
        return $this->render('index',compact('builds', /*'characteristics'*/));
    }
}
?>