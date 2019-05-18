<?php

use yii\db\Migration;

/**
 * Handles adding inputdata to table `{{%calc_component_group}}`.
 */
class m190516_125729_add_inputdata_column_to_calc_component_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calc_component_group}}', 'inputdata', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calc_component_group}}', 'inputdata');
    }
}
