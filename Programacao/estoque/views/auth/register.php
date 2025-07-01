<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Criar Conta';
?>
<div class="container mt-5" style="max-width:500px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['autocomplete' => 'off'],
                'enableAjaxValidation' => false,
            ]); ?>

                <?= $form->field($model, 'username')
                         ->textInput(['placeholder' => 'Escolha um usuário']) ?>

                <?= $form->field($model, 'email')
                         ->input('email', ['placeholder' => 'Seu e-mail']) ?>

                <?= $form->field($model, 'password')
                         ->passwordInput(['placeholder' => 'Escolha uma senha']) ?>

                <?= $form->field($model, 'password_repeat')
                         ->passwordInput(['placeholder' => 'Repita a senha']) ?>

                <div class="form-group mt-4">
                    <?= Html::submitButton('Registrar', [
                        'class' => 'btn btn-success w-100',
                        'name'  => 'register-button'
                    ]) ?>
                </div>

            <?php ActiveForm::end(); ?>

            <div class="mt-3 text-center">
                <?= Html::a('Já tem conta? Entrar', ['auth/login']) ?>
            </div>
        </div>
    </div>
</div>
