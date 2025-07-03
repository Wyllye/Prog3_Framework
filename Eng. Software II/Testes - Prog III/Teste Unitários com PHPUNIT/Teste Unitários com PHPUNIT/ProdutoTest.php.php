<?php
namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\Produto;

class ProdutoTest extends TestCase
{
    /**
     * @var Produto
     */
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Produto();
    }

    public function testNomeObrigatorio()
    {
        $this->model->nome = '';
        $this->model->unidade = 'UN';
        $this->model->preco = 5.00;
        $this->model->situacao = 'Ativo';

        $this->assertFalse($this->model->validate(['nome']));
        $this->assertArrayHasKey('nome', $this->model->getErrors());
    }

    public function testPrecoDeveSerNumericoMaiorQueZero()
    {
        $this->model->nome = 'Teste';
        $this->model->unidade = 'KG';
        $this->model->preco = -1;
        $this->model->situacao = 'Ativo';

        $this->assertFalse($this->model->validate(['preco']));
        $this->assertArrayHasKey('preco', $this->model->getErrors());

        $this->model->preco = 'abc';
        $this->assertFalse($this->model->validate(['preco']));
    }

    public function testUnidadeValida()
    {
        $this->model->nome = 'Teste';
        $this->model->unidade = 'XYZ';
        $this->model->preco = 1.50;
        $this->model->situacao = 'Ativo';

        // supondo que UN|KG|LT|PC sejam permitidas
        $this->assertFalse($this->model->validate(['unidade']));
        $this->assertArrayHasKey('unidade', $this->model->getErrors());

        $this->model->unidade = 'UN';
        $this->assertTrue($this->model->validate(['unidade']));
    }

    public function testSituacaoAceitaApenasAtivoOuInativo()
    {
        $this->model->nome = 'Teste';
        $this->model->unidade = 'UN';
        $this->model->preco = 2.00;
        $this->model->situacao = 'Bloqueado';

        $this->assertFalse($this->model->validate(['situacao']));
        $this->assertArrayHasKey('situacao', $this->model->getErrors());

        $this->model->situacao = 'Inativo';
        $this->assertTrue($this->model->validate(['situacao']));
    }
}
