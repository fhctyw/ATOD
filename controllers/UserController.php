<?php

namespace app\controllers;

use Yii;
use app\models\User;
use \yii\base\Controller;
class UserController extends Controller {
    
    public function actionIndex() {

        $users = User::findbyId('1');
        return $this->render('index',compact('users'));
    }



    public function actionProfile() {

        $id = Yii::$app->user->identity->id;
        $user = User::findbyId($id);
        return $this->render('profile',compact('user'));
    }
}



?>