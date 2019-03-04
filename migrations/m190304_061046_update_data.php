<?php

use yii\db\Migration;

/**
 * Class m190304_061046_update_data
 */
class m190304_061046_update_data extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->execute('TRUNCATE TABLE `yii_user`; INSERT INTO `yii_user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES (1, \'hradmin\', \'$2y$13$NjcNM7nsLUfhVrWK7ysEz.bGHW4RvrTWItDCRcfpi.F9L6OSQJaIW\', NULL, \'mail@v-stepanov.ru\', \'hxVGfHXcxef91MKJ1ltmnUb0_dDV_FQn\', 10, 1551645976, 1551645976);');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        echo "m190304_061046_update_data cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190304_061046_update_data cannot be reverted.\n";

      return false;
      }
     */

}
