<?php

namespace app\controllers;

use Yii;
use app\models\User;
use \yii\base\Controller;

class UserController extends Controller {
    
    public function actionIndex() 
    {
        $id = Yii::$app->request->get('id');
        $user = User::findById($id);
        //var_dump($users);
        //die;
        return $this->render('index',compact('users'));
    }
}


?>