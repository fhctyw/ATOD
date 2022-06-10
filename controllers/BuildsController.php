<?php

namespace app\controllers;

use app\models\Builds;
use app\models\Builds_part;
use app\models\Products;
use yii\web\Controller;
use app\models\Characteristics;
use app\models\Admins;
use Yii;

class BuildsController extends Controller {
    public function actionIndex($id) 
    {
        $build = Builds::findIdentity($id);
        $characteristics = [];
        foreach($build->parts as $part)
        {
            array_push($characteristics, [Products::findIdentity($part->product_id)->product_name, Characteristics::findIdentity($part->product_id)]); 
        }
        if (isset(Yii::$app->request->post()['state']))
        {
            $b = Builds::findIdentity($id);
            $b->is_allowed = (bool)Yii::$app->request->post('state');    
            $b->save();
        }
        return $this->render('index',compact('build', 'characteristics', 'shouldChangeState'));
    }

    public function activeChangeState($id)
    {

        return $this->refresh();
    }
}
?>