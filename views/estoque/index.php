<?php

use app\models\Estoque;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estoques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estoque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        [
            'attribute' => 'produto_id',
            'value' => function ($model) {
                return $model->produto->nome ?? '(Não encontrado)';
            },
            'label' => 'Produto',
        ],
        'tipo_movimentacao',
        'quantidade',
        'data_movimentacao',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Estoque $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>


</div>
