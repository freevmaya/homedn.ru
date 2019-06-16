<?php

use yii\db\Migration;

/**
 * Handles adding desclink to table `{{%lending_list}}`.
 */
class m190616_124549_add_desclink_column_to_lending_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lending_list}}', 'desclink', $this->string(1024));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lending_list}}', 'desclink');
    }
}
