<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250624_173328_create_table_user extends Migration
{
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'password_hash' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
