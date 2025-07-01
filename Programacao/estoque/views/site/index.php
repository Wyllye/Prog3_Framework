<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var int $totalProdutos */
/* @var float $valorEstoque */

$this->title                   = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron bg-light p-4">
        <h1 class="display-5">Bem-vindo ao Sistema de Controle de Estoque</h1>

        <p class="lead mt-3">
            <?= Html::a(
                '<i class="bi bi-plus-lg"></i> Nova Entrada',
                ['estoque/create', 'tipo' => 'entrada'],
                ['class' => 'btn btn-success me-2']
            ) ?>
            <?= Html::a(
                '<i class="bi bi-dash-lg"></i> Nova Saída',
                ['estoque/create', 'tipo' => 'saida'],
                ['class' => 'btn btn-danger me-2']
            ) ?>
            <?= Html::a(
                '<i class="bi bi-box-seam"></i> Produtos',
                ['produto/index'],
                ['class' => 'btn btn-primary me-2']
            ) ?>
        </p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Produtos</h5>
                    <p class="display-4"><?= $totalProdutos ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Valor Atual do Estoque</h5>
                    <p class="display-4 text-success">
                        <?= Yii::$app->formatter->asCurrency($valorEstoque, 'BRL') ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- aqui viria seu gráfico, por ex.: -->
        <?php /* echo $this->render('_grafico', [...]); */ ?>
    </div>

</div>
