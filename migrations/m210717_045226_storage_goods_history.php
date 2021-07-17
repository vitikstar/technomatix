<?php

use yii\db\Migration;

/**
 * Class m210717_045226_storage_goods_history
 */
class m210717_045226_storage_goods_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('storage_goods_history', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'goods_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->null(),
            'updated_at' => $this->integer()->null(),
            'operation' => $this->integer()->notNull()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%storage_goods_history}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210717_045226_storage_goods_history cannot be reverted.\n";

        return false;
    }
    */
}
