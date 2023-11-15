<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230819_165507_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(150)->notNull(),
            'username' => $this->string(150)->notNull(),
            'password' => $this->string(50)->notNull(),
            'auth_key' => $this->string(50)->notNull(),
            'status' => $this->integer(),
            'access_token' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->insert('user', [
            'id' => 1,
            'nama' => 'Owner ASD',
            'username' => 'owner',
            'password' => 'owner',
            'auth_key' => 'ownerasd01',
            'status' => 10,
            'access_token' => 'ownerasd01',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
