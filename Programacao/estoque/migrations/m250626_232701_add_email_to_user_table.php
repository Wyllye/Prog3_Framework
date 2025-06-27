<?php

use yii\db\Migration;

/**
 * Handles adding email to table `{{%user}}`.
 */
class m250626_232701_add_email_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Adiciona a coluna email após username, não-nula e única
        $this->addColumn('{{%user}}', 'email', $this->string(255)->notNull()->unique()->after('username'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remove a coluna email
        $this->dropColumn('{{%user}}', 'email');
    }
}
