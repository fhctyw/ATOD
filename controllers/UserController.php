<?php

namespace app\controllers;

use app\models\User;
//use app\models\Products;
//use app\models\Feedbacks;
use \yii\base\Controller;
class UserController extends Controller {
    
    public function actionIndex() {

        $users = User::findbyUsername('Макс');
        //$products = Products::find()->all();
        //$feedback = Feedbacks::find()->all();
        //var_dump($users);
        //die;
        return $this->render('index',compact('users'));
    }
}


?>