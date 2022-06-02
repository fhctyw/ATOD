<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Products;
use app\models\Builds;
use app\models\BuildPart;
use yii\data\Pagination;
use yii\base\Controller;

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
        //$builds->parts = BuildPart::find()->where(['build_id'=>$active_id])->all();
        //$builds_part = Builds_part::find()->where(['build_id'=>$active_id])->all();//WHERE(['build_id'=> $active_id])
       // $value = ArrayHelper::getValue($builds, 'foo.bar.');
        /* $query = Products::find()->offset(10);
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>20]); */
        /*$products_id = $builds_part->product_id;
        $products = Products::find()->WHERE(['product_id' => $products_id])->one(); */
        //$builds = Products::find()->offset($pages->offset)->limit($pages->limit)->WHERE(['<=','parts',$pages])->all();
        //where(['product_name','replace(title," ", "")
        //var_dump($builds);
        return $this->render('profile',compact('user','builds','builds_count'));
    }
}



?>