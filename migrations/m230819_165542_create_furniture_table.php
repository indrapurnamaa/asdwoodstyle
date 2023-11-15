<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%furniture}}`.
 */
class m230819_165542_create_furniture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%furniture}}', [
            'id' => $this->primaryKey()->notNull(),
            'id_user' => $this->integer(),
            'nama_furniture' => $this->string(150)->notNull(),
            'deskripsi' => $this->string(150)->notNull(),
            'harga' => $this->integer()->notNull(),
            'gambar' => $this->string(150),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-furniture-id_user',
            'furniture',
            'id_user',
        );

        $this->addForeignKey(
            'fk-furniture-id_user',
            'furniture',
            'id_user',
            'user',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%furniture}}');
    }
}
