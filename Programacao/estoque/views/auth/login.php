<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $model app\models\LoginForm */
$this->title = 'Login';
?>
<div class="container mt-5" style="max-width:400px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white rounded-top">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')
                         ->textInput([
                             'autofocus'   => true,
                             'placeholder' => 'Digite seu usuário',
                         ]) ?>

                <?= $form->field($model, 'password')
                         ->passwordInput([
                             'placeholder' => 'Digite sua senha',
                         ]) ?>

                <div class="form-group mt-4">
                    <?= Html::submitButton('Entrar', [
                        'class' => 'btn btn-success w-100',
                        'name'  => 'login-button'
                    ]) ?>
                </div>

            <?php ActiveForm::end(); ?>

            <div class="mt-3 text-center">
                <?= Html::a('Novo usuário? Criar conta', ['auth/register']) ?>
            </div>
        </div>
    </div>
</div>
