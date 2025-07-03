<?php
namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\Estoque;
use app\models\Produto;

class EstoqueTest extends TestCase
{
    /**
     * @var Estoque
     */
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Estoque();
    }

    public function testProdutoIdObrigatorio()
    {
        $this->model->produto_id = null;
        $this->model->quantidade = 1;
        $this->model->data_movimentacao = date('Y-m-d');
        $this->model->tipo_movimentacao = 'entrada';

        $this->assertFalse($this->model->validate(['produto_id']));
        $this->assertArrayHasKey('produto_id', $this->model->getErrors());
    }

    public function testQuantidadeDeveSerInteiroPositivo()
    {
        $this->model->produto_id = 1;
        $this->model->quantidade = -5;
        $this->model->data_movimentacao = date('Y-m-d');
        $this->model->tipo_movimentacao = 'entrada';

        $this->assertFalse($this->model->validate(['quantidade']));
        $this->assertArrayHasKey('quantidade', $this->model->getErrors());

        $this->model->quantidade = 'dez';
        $this->assertFalse($this->model->validate(['quantidade']));
    }

    public function testTipoMovimentacaoAceitaApenasEntradaOuSaida()
    {
        $this->model->produto_id = 1;
        $this->model->quantidade = 1;
        $this->model->data_movimentacao = date('Y-m-d');
        $this->model->tipo_movimentacao = 'transferencia';

        $this->assertFalse($this->model->validate(['tipo_movimentacao']));
        $this->assertArrayHasKey('tipo_movimentacao', $this->model->getErrors());

        $this->model->tipo_movimentacao = 'saida';
        $this->assertTrue($this->model->validate(['tipo_movimentacao']));
    }

    public function testDataMovimentacaoPadraoHoje()
    {
        // sem atribuir data, deve usar data atual
        $this->model->produto_id = 1;
        $this->model->quantidade = 1;
        $this->model->tipo_movimentacao = 'entrada';

        $this->assertTrue($this->model->validate(['data_movimentacao']));
        $this->assertEquals(date('Y-m-d'), $this->model->data_movimentacao);
    }
}
