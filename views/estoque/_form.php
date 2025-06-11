<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produto;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estoque-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto_id')->dropDownList(
        ArrayHelper::map(Produto::find()->all(), 'id', 'nome'),
        ['prompt' => 'Selecione um produto']
    ) ?>

    <?= $form->field($model, 'tipo_movimentacao')->dropDownList([
        'entrada' => 'Entrada',
        'saida' => 'Saída',
    ], ['prompt' => '']) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
