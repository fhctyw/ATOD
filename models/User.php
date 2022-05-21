<?php

namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
   /*  public $id;
    public $name;
    public $email;
    public $password;
    public $url_photo; */
    //public $_accessToken;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        */

        return null;
    }

    public static function findByUsername($name)
    {
        $user = static::find()->where(['name'=>$name])->one();
        if ($user) 
        {
            return $user;
        }
        return null;
    }

    public static function findById($id)
    {
        $user = static::find()->where(['id'=>$id])->one();
        if ($user) {
            return $user;
        } 
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
