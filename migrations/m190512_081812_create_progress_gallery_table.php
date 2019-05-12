<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progress_gallery}}`.
 */
class m190512_081812_create_progress_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progress_gallery}}', [
            'id' => $this->primaryKey(),
            'year' => $this->string(),
            'sort' => $this->integer(),
            'header' => $this->string(),
            'content' => $this->string(2048),
            'media' => $this->string(4096),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%progress_gallery}}');
    }
}
