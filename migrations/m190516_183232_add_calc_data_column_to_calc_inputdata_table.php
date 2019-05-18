<?php

use yii\db\Migration;

/**
 * Handles adding calc_data to table `{{%calc_inputdata}}`.
 */
class m190516_183232_add_calc_data_column_to_calc_inputdata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calc_inputdata}}', 'calc_data', $this->string(2048));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calc_inputdata}}', 'calc_data');
    }
}
