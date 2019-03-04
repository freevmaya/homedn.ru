<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190303_200722_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(1024)->notNull()->unique(),
            'password_hash' => $this->string(1024)->notNull(),
            'password_reset_token' => $this->string(1024),
            'email' => $this->string(1024)->unique()->notNull(),
            'auth_key' => $this->string(1024),
            'status' => $this->integer()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
