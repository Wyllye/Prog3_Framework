<?php
use yii\helpers\Html;
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

<div class="dashboard-container">

    <h1 class="dashboard-title">Bem-vindo ao Sistema de Controle de Estoque</h1>

    <p class="mb-4">
        <?= Html::a('➕ Nova Entrada', ['estoque/create','tipo'=>'entrada'], ['class' => 'btn btn-success btn-nova-entrada']) ?>
        <?= Html::a('➖ Nova Saída',   ['estoque/create','tipo'=>'saida'],   ['class' => 'btn btn-danger btn-nova-saida']) ?>
        <?= Html::a('📦 Produtos',   ['produto/index'], ['class' => 'btn btn-produtos']) ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <div class="dashboard-card">
                <h4>Total de Produtos</h4>
                <p class="display-4"><?= Html::encode($totalProdutos) ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card">
                <h4>Valor Atual do Estoque</h4>
                <p class="display-4 text-success">R$ <?= number_format($valorTotal,2,',','.') ?></p>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <h4>Gráfico de Movimentações</h4>
        <canvas id="graficoEstoque" width="800" height="300"></canvas>
    </div>

</div>

<!-- Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoEstoque').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [], // em breve
            datasets: [{
                label: 'Movimentação de Estoque',
                data: [], // em breve
                borderColor: '#74c0fc',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
