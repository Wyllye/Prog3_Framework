<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estoques';
?>
<div class="estoque-index">

    <!-- sua breadcrumb customizada -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent px-0">
        <li class="breadcrumb-item">
          <a href="<?= \yii\helpers\Url::to(['home/index']) ?>">Página Inicial</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <?= Html::encode($this->title) ?>
        </li>
      </ol>
    </nav>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <p>
                <?= Html::a('➕ Nova Movimentação', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover table-bordered'],
                'summaryOptions' => ['class' => 'text-muted mb-2'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id',
                        'label' => 'ID',
                    ],
                    [
                        'attribute' => 'produto_id',
                        'label' => 'Produto',
                        'value' => 'produto.nome',
                    ],
                    [
                        'attribute' => 'tipo_movimentacao',
                        'label' => 'Tipo Mov.',
                    ],
                    [
                        'attribute' => 'quantidade',
                        'label' => 'Quantidade',
                    ],
                    [
                        'attribute' => 'data_movimentacao',
                        'label' => 'Data',
                        'format' => ['date', 'php:d/m/Y'],
                    ],

                    // aqui voltam os ícones de view/update/delete
                    [
                        'class'    => 'yii\grid\ActionColumn',
                        'header'   => 'Ações',
                        'template' => '{view} {update} {delete}',
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
