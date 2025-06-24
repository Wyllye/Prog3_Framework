<?php

use app\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index" style="background-color: #f0f8ff; padding: 20px; border-radius: 10px;">

    <h1 style="color: #0d6efd;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('➕ Criar Produto', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '', // <<< Adiciona esta linha para esconder a mensagem
    'columns' => [
        'id',  // já alterado para ID
        'nome',
        'unidade_produto',
        'preco',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>

</div>
