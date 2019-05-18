<?php

use yii\db\Migration;

/**
 * Handles adding countable to table `{{%calc_component_element}}`.
 */
class m190515_075720_add_countable_column_to_calc_component_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calc_component_element}}', 'countable', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calc_component_element}}', 'countable');
    }
}
