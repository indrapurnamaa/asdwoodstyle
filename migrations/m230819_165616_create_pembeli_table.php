<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pembeli}}`.
 */
class m230819_165616_create_pembeli_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pembeli}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'nama_pembeli' => $this->string(150)->notNull(),
            'alamat' => $this->string(150)->notNull(),
            'no_telp' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-pembeli-id_user',
            'pembeli',
            'id_user',
        );

        $this->addForeignKey(
            'fk-pembeli-id_user',
            'pembeli',
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
        $this->dropTable('{{%pembeli}}');
    }
}
