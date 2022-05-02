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
            $user->_name = $this->name;
            $user->_password = $this->password;
            $comm = Yii::$app->db->createCommand('INSERT INTO users (firstname, Email, Coin, Password) VALUES(:name, :email, 0, :password)');
            $comm->bindParam(':name', $user->_name);
            $comm->bindParam(':email', $this->email);
            $comm->bindParam(':password', $user->_password);
            $comm->execute();
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
