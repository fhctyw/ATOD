<?php

namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $_id;
    public $_name;
    public $_password;
    public $_authKey;
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

    public static function findByUsername($username)
    {
        $user = static::find()->where(['name'=>$username])->one();
        if ($user) {
            $user->_id = $user->id;
            $user->_name = $user->name;
            $user->_password = $user->password;
            return $user;
        } 
        return null;
    }

    public static function findById($id)
    {
        $user = static::find()->where(['id'=>$id])->one();
        if ($user) {
            $user->_id = $user->id;
            $user->_name = $user->name;
            $user->_password = $user->password;
            return $user;
        } 
        return null;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getAuthKey()
    {
        return $this->_authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->_authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->_password === $password;
    }
}
