<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Expression;
use app\models\Produto;
use app\models\Estoque;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

// Dados
$totalProdutos = Produto::find()->count();
$valorTotal = (new \yii\db\Query())
    ->select([new Expression('SUM(p.preco * IF(e.tipo_movimentacao = "entrada", e.quantidade, -e.quantidade))')])
    ->from(['e' => 'estoque'])
    ->leftJoin(['p' => 'produto'], 'p.id = e.produto_id')
    ->scalar();
$valorTotal = $valorTotal ?? 0;
?>

<div class="site-index">
    <h1 class="mb-4">Bem-vindo ao Sistema de Controle de Estoque</h1>

    <div class="mb-4">
        <?= Html::a('➕ Nova Entrada', ['estoque/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('➖ Nova Saída', ['estoque/create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('📦 Produtos', ['produto/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h4>Total de Produtos</h4>
                <p class="display-6">
                    <?= Html::encode($totalProdutos) ?>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h4>Valor Atual do Estoque</h4>
                <p class="display-6 text-success">
                    R$ <?= number_format($valorTotal, 2, ',', '.') ?>
                </p>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <h4 class="mb-3">Gráfico de Movimentações (em breve)</h4>
        <canvas id="graficoEstoque" width="800" height="300"></canvas>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoEstoque').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Movimentação de Estoque',
                data: [],
                borderColor: 'green',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
