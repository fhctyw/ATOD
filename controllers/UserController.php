<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Products;
use app\models\Builds;
use app\models\BuildPart;
use yii\data\Pagination;
use yii\base\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class UserController extends Controller {
    
    public function actionIndex() 
    {
        $id = Yii::$app->request->get('id');
        $user = User::findById($id);
        //var_dump($users);
        //die;
        return $this->render('index',compact('users'));
    }



    public function actionProfile() {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $active_id = Yii::$app->user->identity->id;
        $user = User::findbyId($active_id);
        $builds = Builds::findAllIdentity($active_id);
        $builds_count = count($builds);
        $model = new UploadForm();
    
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->render('profile',compact('user','builds','builds_count','model'));
            }
        }
        return $this->render('profile',compact('user','builds','builds_count','model'));
    }

    public function actionUpload()
    {

        return $this->render('upload', ['model' => $model]);
    }
}



?>