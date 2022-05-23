<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            [['name','email','password'],'required'],
            [['name','email','password'], 'validateInputs'],
        ];
    }

    public function register()
    {
        if ($this->validate())
        {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->save();
            return Yii::$app->user->login($user, 3600*24*30);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->name);
        }
        return $this->_user;
    }

    public function validateInputs($attribute)
    {
        if (!$this->hasErrors()) {
            
            $user = $this->getUser();
            if ($user !== null) {
                $this->addError($attribute, 'Incorrect inputs.');
            }
        }
    }
}
