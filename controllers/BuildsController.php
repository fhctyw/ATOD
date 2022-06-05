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
        $characteristics = [];
        foreach($build->parts as $part)
        {
            array_push($characteristics, [Products::findIdentity($part->product_id)->product_name, Characteristics::findIdentity($part->product_id)]); 
        }
    return $this->render('index',compact('build', 'characteristics'));
    }
}
?>