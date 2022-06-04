<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\Products;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\Busket;
use app\models\TestModel;
use app\models\User;
use app\models\ProductSearch;
use app\models\CheckboxList;
use app\models\UploadForm;

class HomeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $best_builds = Products::find()->orderBy('price DESC')->limit(10)->all();
        $query = Products::find()->offset(10);
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>20]);
        $products = Products::find()->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('best_builds', 'pages', 'products'));
    }
   /** Register action
    *
    * @return Response|string
    *
    */
    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register())
        {
            return $this->goHome();
        }
            
        return $this->render('register', compact('model'));
    }




    public function actionTest()
    {
        
        return $this->render('test');
    }

   





    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays busket.
     *
     * @return string
     */
/*     public function actionBusket()
    {
        $model = new Busket();

        return $this->render('busket');
    } */
    /**
     * Displays search.
     *
     * @return string
     */
    public function actionSearch()
    {
        /*$search = Yii::$app->request->get('search');
        $search1 = str_replace(' ', '', $search);
        $query = Products::find()->where(['product_name','replace(title," ", "")',$search1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);
        return $this->render('index',compact('dataProvider','search1'));  */
        //////////////////////////////////////////////////////////////////////////////////////
        /*if(isset())-
        {

        }*/
        $model = new CheckboxList();
        $query = Products::find();
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>20]);
        $products = Products::find()->offset($pages->offset)->limit($pages->limit)->all();


        if($model->load(Yii::$app->request->post()) && $model->check())
        {
            $query = Products::find()->where(["category"=>$model->categories]);
            $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>20]);
            $products =  $query->offset($pages->offset)->limit($pages->limit)->all();

            
        }    

        return $this->render('search',compact('model', 'products', 'pages'));
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}

/**
 * Displays contact page.
 *
 * @return Response|string
 */
/* public function actionContact()
{
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('contactFormSubmitted');

        return $this->refresh();
    }
    return $this->render('contact', [
        'model' => $model,
    ]);
} */