<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Description of UserForm
 *
 * @author stepanov
 */
class UserForm extends Model
{

    public $username;
    public $password;
    public $email;

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ 'username', 'trim' ],
            [ 'username', 'required' ],
            [ 'username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.' ],
            [ 'username', 'string', 'min' => 2, 'max' => 255 ],
            [ 'email', 'trim' ],
            [ 'email', 'required' ],
            [ 'email', 'email' ],
            [ 'email', 'string', 'max' => 255 ],
            [ 'email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.' ],
            [ 'password', 'required' ],
            [ 'password', 'string', 'min' => 6 ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup ()
    {
        if (!$this->validate()) {
            return null;
        }

        $user           = new User();
        $user->username = $this->username;
        $user->email    = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

    public function attributeLabels ()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'email'    => 'E-mail',
        ];
    }

}
