<?php
namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    // atributos virtuais usados só no formulário
    public $password;
    public $password_repeat;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            // colunas da tabela
            [['username', 'email'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'string', 'max' => 255],

            // senha apenas no registro
            ['password', 'required', 'on' => 'register'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'As senhas não coincidem'],

            // demais regras de status/auth_key se tiver...
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'        => 'Usuário',
            'email'           => 'E-mail',
            'password'        => 'Senha',
            'password_repeat' => 'Repita a Senha',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        // gera auth_key uma só vez ao criar
        if ($insert) {
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        // se password foi preenchido, gera hash
        if (!empty($this->password)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        return true;
    }

    // IdentityInterface...

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Busca usuário pelo username
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}
