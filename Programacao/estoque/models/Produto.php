<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "produto".
 *
 * @property int      $id
 * @property string   $nome
 * @property string   $unidade_produto
 * @property float    $preco
 *
 * @property Estoque[] $movimentacoes
 */
class Produto extends ActiveRecord
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
            [['unidade_produto'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'               => 'ID',
            'nome'             => 'Nome',
            'unidade_produto'  => 'Unidade',
            'preco'            => 'Preço',
        ];
    }

    /**
     * Relação com movimentações de estoque
     * @return \yii\db\ActiveQuery
     */
    public function getMovimentacoes()
    {
        return $this->hasMany(Estoque::class, ['produto_id' => 'id']);
    }

    /**
     * Retorna o saldo atual de estoque (entradas - saídas)
     * @return float
     */
    public function getEstoqueAtual(): float
    {
        $saldo = 0;
        foreach ($this->movimentacoes as $mov) {
            if ($mov->tipo_movimentacao === 'entrada') {
                $saldo += (float)$mov->quantidade;
            } else {
                $saldo -= (float)$mov->quantidade;
            }
        }
        return $saldo;
    }
}
