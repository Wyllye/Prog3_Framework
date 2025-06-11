<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property string $unidade_produto
 * @property float $preco
 */
class Produto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'unidade_produto', 'preco'], 'required'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 255],
            [['unidade_produto'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'unidade_produto' => 'Unidade Produto',
            'preco' => 'Preco',
        ];
    }

}
