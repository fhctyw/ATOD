<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $coins;
 
    public function rules()
    {
        return [
            [['name','email','password'],'required'],
            ['email','email'],
            ['name','unique','targetClass'=>'app\models\User'],
            ['email','unique','targetClass'=>'app\models\User'],
            ['password','string','min'=>3,'max'=>14]
        ];
    }

    public function register()
    {
        $user = new users();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        return $user->save();
    }

}
