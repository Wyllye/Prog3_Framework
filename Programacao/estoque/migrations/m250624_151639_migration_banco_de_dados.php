<?php

use yii\db\Migration;

/**
 * Class m250624_151639_migration_banco_de_dados
 */
class m250624_151639_migration_banco_de_dados extends Migration
{
    public function safeUp()
    {
        
        $this->createTable('produto', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'unidade_produto' => $this->string(500)->notNull(),
            'preco' => $this->decimal(10, 2)->notNull(),
        ]);

        
        $this->createTable('estoque', [
            'id' => $this->primaryKey(),
            'produto_id' => $this->integer()->notNull(),
            'tipo_movimentacao' => $this->string(20)->notNull(),
            'quantidade' => $this->integer()->notNull(),
            'data_movimentacao' => $this->date(),
        ]);

        
        $this->addForeignKey(
            'fk-estoque-produto_id',
            'estoque',
            'produto_id',
            'produto',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        
        $this->dropForeignKey('fk-estoque-produto_id', 'estoque');
        $this->dropTable('estoque');
        $this->dropTable('produto');
    }
}
