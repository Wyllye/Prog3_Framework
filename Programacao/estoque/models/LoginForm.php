<?php
namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    /**
     * Regras de validação
     */
    public function rules()
    {
        return [
            // username e password são obrigatórios
            [['username', 'password'], 'required'],
            // rememberMe deve ser booleano
            ['rememberMe', 'boolean'],
            // validação de senha
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Valida a senha em conjunto com o usuário
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password_hash)) {
                $this->addError($attribute, 'Usuário ou senha incorretos.');
            }
        }
    }

    /**
     * Rótulos em português
     */
    public function attributeLabels()
    {
        return [
            'username'   => 'Usuário',
            'password'   => 'Senha',
            'rememberMe' => 'Lembrar-me',
        ];
    }

    /**
     * Faz login do usuário usando os dados do formulário.
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
                $this->getUser(),
                $this->rememberMe ? 3600*24*30 : 0
            );
        }
        return false;
    }

    /**
     * Busca o usuário pelo username
     *
     * @return User|null
     */
    protected function getUser()
    {
        return User::findByUsername($this->username);
    }
}
