<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('<i class="bi bi-plus-lg"></i> Criar Produto', ['create'], [
        'class' => 'btn btn-primary mb-3'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover table-bordered',
            'style' => 'margin-bottom: 0;',
        ],
        'columns' => [
            [
                'class'         => 'yii\grid\SerialColumn',
                'header'        => 'Código',
                'headerOptions' => ['style' => 'width: 80px; text-align:center;'],
                'contentOptions'=> ['style' => 'text-align:center;'],
            ],
            [
                'attribute'      => 'id',
                'headerOptions'  => ['style' => 'width: 60px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute'      => 'nome',
                'headerOptions'  => ['style' => 'width: 180px;'],
                'contentOptions' => [
                    'style' => 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'
                ],
            ],
            [
                'attribute'      => 'unidade_produto',
                'label'          => 'Unidade',
                'headerOptions'  => ['style' => 'width: 100px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute'      => 'preco',
                'label'          => 'Preço R$',
                'value'          => function($model) {
                    return Yii::$app->formatter->asDecimal($model->preco, 2);
                },
                'headerOptions'  => ['style' => 'width: 120px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:right;'],
            ],
            [
                'attribute'      => 'estoqueAtual',
                'label'          => 'Estoque',
                'value'          => function($model) {
                    return $model->estoqueAtual;
                },
                'headerOptions'  => ['style' => 'width: 100px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'class'     => 'yii\grid\ActionColumn',
                'template'  => '{update} {delete}',
                'header'    => 'Ações',
                'buttons'   => [
                    'update' => function($url, $model) {
                        return Html::a(
                            '<i class="bi bi-pencil"></i>',
                            $url,
                            ['class' => 'btn btn-sm btn-outline-primary', 'title' => 'Editar']
                        );
                    },
                    'delete' => function($url, $model) {
                        return Html::a(
                            '<i class="bi bi-trash"></i>',
                            $url,
                            [
                                'class'        => 'btn btn-sm btn-outline-danger',
                                'title'        => 'Excluir',
                                'data-confirm' => 'Tem certeza?',
                                'data-method'  => 'post',
                            ]
                        );
                    },
                ],
                'headerOptions'  => ['style' => 'width:120px; text-align:center;'],
                'contentOptions' => ['style' => 'white-space: nowrap;'],
            ],
        ],
    ]); ?>

</div>
