<?php

use yii\db\Migration;

/**
 * Handles adding list_number to table `{{%lending_list}}`.
 */
class m190521_141331_add_list_number_column_to_lending_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lending_list}}', 'list_number', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lending_list}}', 'list_number');
    }
}
