<?php

use yii\db\Migration;

/**
 * Handles adding complect_data to table `{{%calc_inputdata}}`.
 */
class m190520_004122_add_complect_data_column_to_calc_inputdata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calc_inputdata}}', 'complect_data', $this->string(1024));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calc_inputdata}}', 'complect_data');
    }
}
