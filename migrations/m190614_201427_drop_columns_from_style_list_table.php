<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%style_list}}`.
 */
class m190614_201427_drop_columns_from_style_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%style_list}}', 'image');
        $this->dropColumn('{{%style_list}}', 'color1');
        $this->dropColumn('{{%style_list}}', 'color2');
        $this->dropColumn('{{%style_list}}', 'color3');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
    }
}
