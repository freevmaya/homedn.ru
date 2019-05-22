<?php

use yii\db\Migration;

/**
 * Handles adding designer to table `{{%employee}}`.
 */
class m190521_165824_add_designer_column_to_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%employee}}', 'designer', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%employee}}', 'designer');
    }
}
