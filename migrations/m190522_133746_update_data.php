<?php

use yii\db\Migration;

/**
 * Class m190522_133746_update_data
 */
class m190522_133746_update_data extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
//        $sql = file_get_contents(__DIR__ . '/data.sql');
//        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        echo "m190522_133746_update_data cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190522_133746_update_data cannot be reverted.\n";

      return false;
      }
     */

}
