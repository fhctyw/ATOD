<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Products;
use \app\models\LoginForm;
use \app\models\RegisterForm;
use \app\models\BusketForm;
use app\models\User;

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
        //$products = Products::find()->where(['ProductName'=>'NVIDIA GeForce RTX 3050'])->one();
        //$products = Products::find()->where(['Product_Id' => 20 ])->All();
        $products = Products::find()->where(['<=','Product_Id' ,19 ])->All();
        return $this->render('index',compact('products'));
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
    public function actionBusket()
    {
        $model = new BusketForm();

        return $this->render('busket');
    }
    /**
     * Displays search.
     *
     * @return string
     */
    public function actionSearch()
    {
        /*$search = Yii::$app->request->get('search');
        $search1 = str_replace(' ', '', $search);
        $query = Products::find()->where(['ProductName','replace(title," ", "")',$search1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);
        return $this->render('index',compact('dataProvider','search1'));
        */
        return $this->render('search');
        
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