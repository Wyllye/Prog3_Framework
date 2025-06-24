<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estoque $model */

$this->title = 'Editar Movimentação #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estoques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
