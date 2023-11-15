<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%galeri}}`.
 */
class m231007_132433_create_galeri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%galeri}}', [
            'id' => $this->primaryKey(),
            'gambar' => $this->string(150),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%galeri}}');
    }
}
