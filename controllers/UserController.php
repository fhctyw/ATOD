<?php

namespace app\controllers;

use app\models\Users;
use app\models\Products;
use app\models\Feedbacks;
use \yii\base\Controller;
class UserController extends Controller {

    public function actionIndex() {

        $users = Users::find()->all();
        $products = Products::find()->all();
        $feedback = Feedbacks::find()->all();

        return $this->render('index',compact('products','users','feedback'));
    }
}


?>