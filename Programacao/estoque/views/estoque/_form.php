<?php
// File: views/estoque/_form.php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produto;
use app\models\Estoque;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estoque-form">
    <!-- Card principal com sombra e espaçamento -->
    <div class="card shadow-sm mb-4">
        <!-- Cabeçalho azul com título em branco -->
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0"><?= Html::encode($this->title) /* 'Entrada' ou 'Saída' definido em create.php/update.php */ ?></h3>
        </div>
        <!-- Corpo do card: formulário -->
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <!-- Campo Produto (drop-down) -->
                <div class="col-md-6">
                    <?= $form->field($model, 'produto_id')
                        ->dropDownList(
                            ArrayHelper::map(Produto::find()->all(), 'id', 'nome'),
                            ['prompt' => 'Selecione um produto']
                        )
                        ->label('Produto') ?>
                </div>
                <!-- Campo Tipo Movimentação (drop-down) -->
                <div class="col-md-6">
                    <?= $form->field($model, 'tipo_movimentacao')
                        ->dropDownList(
                            Estoque::optsTipoMovimentacao(),
                            ['prompt' => 'Selecione...']
                        )
                        ->label('Tipo Movimentação') ?>
                </div>
            </div>

            <div class="row mt-3">
                <!-- Campo Quantidade (somente inteiros >=1) -->
                <div class="col-md-6">
                    <?= $form->field($model, 'quantidade')
                        ->input('number', [
                            'min' => 1,
                            'step' => 1,
                            'placeholder' => 'Informe um valor inteiro'
                        ])
                        ->label('Quantidade') ?>
                </div>
                <!-- Campo Data (apenas data) -->
                <div class="col-md-6">
                    <?= $form->field($model, 'data_movimentacao')
                        ->input('date')
                        ->label('Data') ?>
                </div>
            </div>

            <!-- Botão de salvar -->
            <div class="form-group mt-4">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
