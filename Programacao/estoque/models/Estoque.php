<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estoque".
 *
 * @property int $id
 * @property int $produto_id
 * @property string $tipo_movimentacao
 * @property int $quantidade
 * @property string|null $data_movimentacao
 *
 * @property Produto $produto
 */
class Estoque extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TIPO_MOVIMENTACAO_ENTRADA = 'entrada';
    const TIPO_MOVIMENTACAO_SAIDA = 'saida';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto_id', 'tipo_movimentacao', 'quantidade'], 'required'],
            [['produto_id', 'quantidade'], 'integer'],
            [['tipo_movimentacao'], 'string'],
            [['data_movimentacao'], 'safe'],
            ['tipo_movimentacao', 'in', 'range' => array_keys(self::optsTipoMovimentacao())],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'tipo_movimentacao' => 'Tipo Movimentacao',
            'quantidade' => 'Quantidade',
            'data_movimentacao' => 'Data Movimentacao',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['id' => 'produto_id']);
    }


    /**
     * column tipo_movimentacao ENUM value labels
     * @return string[]
     */
    public static function optsTipoMovimentacao()
    {
        return [
            self::TIPO_MOVIMENTACAO_ENTRADA => 'entrada',
            self::TIPO_MOVIMENTACAO_SAIDA => 'saida',
        ];
    }

    /**
     * @return string
     */
    public function displayTipoMovimentacao()
    {
        return self::optsTipoMovimentacao()[$this->tipo_movimentacao];
    }

    /**
     * @return bool
     */
    public function isTipoMovimentacaoEntrada()
    {
        return $this->tipo_movimentacao === self::TIPO_MOVIMENTACAO_ENTRADA;
    }

    public function setTipoMovimentacaoToEntrada()
    {
        $this->tipo_movimentacao = self::TIPO_MOVIMENTACAO_ENTRADA;
    }

    /**
     * @return bool
     */
    public function isTipoMovimentacaoSaida()
    {
        return $this->tipo_movimentacao === self::TIPO_MOVIMENTACAO_SAIDA;
    }

    public function setTipoMovimentacaoToSaida()
    {
        $this->tipo_movimentacao = self::TIPO_MOVIMENTACAO_SAIDA;
    }
}
