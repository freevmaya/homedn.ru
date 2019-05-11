<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%youtube_video}}`.
 */
class m190507_064807_create_youtube_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%youtube_video}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string()->notNull(),
            'sort' => $this->integer(),
            'cover' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%youtube_video}}');
    }
}
