<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Products;
use app\models\Builds;
use app\models\Builds_part;
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

        $active_id = Yii::$app->user->identity->id;
        $user = User::findbyId($active_id);
        $builds_part = Builds_part::find()->where(['build_id'=>1])->all();//WHERE(['build_id'=> $active_id])
        $builds = Builds::find()->all();
        /* $query = Products::find()->offset(10);
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>20]); */
       /*  $products_id = $builds_part->product_id;
        $products = Products::find()->WHERE(['product_id' => $products_id])->one(); */
        //$builds = Products::find()->offset($pages->offset)->limit($pages->limit)->WHERE(['<=','parts',$pages])->all();
        //where(['product_name','replace(title," ", "")
        return $this->render('profile',compact('user','builds','builds_part'));
    }
}



?>