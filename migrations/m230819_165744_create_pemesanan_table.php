<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pemesanan}}`.
 */
class m230819_165744_create_pemesanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pemesanan}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'no_pemesanan' => $this->string(150)->notNull(),
            'no_invoice' => $this->string(150)->notNull(),
            'id_pembeli' => $this->integer(),
            'tanggal_pemesanan' => $this->dateTime()->notNull(),
            'id_furniture' => $this->integer(),
            'qty' => $this->integer()->notNull(),
            'pekerjaan' => $this->string(150)->notNull(),
            'harga_unit' => $this->string(150)->notNull(),
            'harga_total' => $this->string(150)->notNull(),
            'dp' => $this->string(150),
            'sisa' => $this->string(150)->notNull(),
            'status' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-pemesanan-id_furniture',
            'pemesanan',
            'id_furniture',
        );

        $this->addForeignKey(
            'fk-pemesanan-id_furniture',
            'pemesanan',
            'id_furniture',
            'furniture',
            'id',
        );

        $this->createIndex(
            'idx-pemesanan-id_pembeli',
            'pemesanan',
            'id_pembeli',
        );

        $this->addForeignKey(
            'fk-pemesanan-id_pembeli',
            'pemesanan',
            'id_pembeli',
            'pembeli',
            'id',
        );

        $this->createIndex(
            'idx-pemesanan-id_user',
            'pemesanan',
            'id_user',
        );

        $this->addForeignKey(
            'fk-pemesanan-id_user',
            'pemesanan',
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
        $this->dropTable('{{%pemesanan}}');
    }
}
