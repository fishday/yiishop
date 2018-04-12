<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $isSeller;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с таким именем уже зарегистрирован'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с такой почтой уже зарегистрирован'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['isSeller', 'boolean'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'isSeller' => 'Я продавец',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
//        $user->save();

        if ($user->save())
        {
            $isSeller = $this->isSeller;

            $auth = \Yii::$app->authManager;

            if ($isSeller == 1)
                $role = $auth->getRole('seller');
            else
                $role = $auth->getRole('customer');
            $auth->assign($role, $user->getId());
        }
        return $user;
    }
}
