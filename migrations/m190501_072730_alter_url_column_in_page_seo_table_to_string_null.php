<?php

use yii\db\Migration;

/**
 * Class m190501_072730_alter_url_column_in_page_seo_table_to_string_null
 */
class m190501_072730_alter_url_column_in_page_seo_table_to_string_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%page_seo}}', 'url', 'varchar(1024) null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190501_072730_alter_url_column_in_page_seo_table_to_string_null cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190501_072730_alter_url_column_in_page_seo_table_to_string_null cannot be reverted.\n";

        return false;
    }
    */
}
