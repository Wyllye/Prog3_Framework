<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form card p-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unidade_produto')
             ->dropDownList([
                 'UN' => 'UN',
                 'KG' => 'KG',
                 'LT' => 'LT',
                 'M'  => 'M',
             ], ['prompt' => 'Selecione a unidade']) ?>

    <?= $form->field($model, 'preco')
             ->textInput(['type' => 'number', 'step' => '0.01', 'min' => 0]) ?>

    <?= $form->field($model, 'estoqueAtual')
             ->textInput([
                 'readonly' => true,
                 'value'    => $model->isNewRecord ? 0 : $model->estoqueAtual,
             ])->label('Estoque Atual') ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
