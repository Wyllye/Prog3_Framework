<?php
use app\models\Estoque;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estoques';
$this->params['breadcrumbs'][] = 'Página Inicial';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-container">

    <!-- Cabeçalho -->
    <div class="estoque-header mb-4 p-3 rounded-top">
        <h1 class="estoque-title mb-0">Estoques</h1>
        <?= Html::a('➕ Nova Movimentação', ['create'], ['class' => 'btn btn-nova-entrada']) ?>
    </div>

    <!-- Grid estilizado -->
    <div class="estoque-grid p-4 rounded-bottom">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => "Exibindo {begin}-{end} de {totalCount} itens.",
            'tableOptions' => ['class' => 'table table-hover'],
            'columns' => [
                [
                    'attribute' => 'id',
                    'label' => 'ID',
                    'headerOptions' => ['class' => 'text-primary'],
                ],
                [
                    'attribute' => 'produto_id',
                    'label' => 'Produto',
                    'value' => function(Estoque $m) { return $m->produto->nome; },
                ],
                'tipo_movimentacao',
                'quantidade:integer',
                [
                    'attribute' => 'data_movimentacao',
                    'label' => 'Data',
                    'format' => ['date', 'php:d/m/Y'],
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Ações',
                    'headerOptions' => ['class' => 'text-primary'],
                    'urlCreator' => function ($action, Estoque $model) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'contentOptions' => ['class' => 'text-end'],
                ],
            ],
        ]); ?>
    </div>

</div>
