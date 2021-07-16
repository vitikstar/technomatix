<?php

use yii\db\Migration;

/**
 * Class m210716_163331_storage_goods_list
 */
class m210716_163331_storage_goods_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('storage_goods_list', [
            'id' => $this->primaryKey(),
            'create_user_id' => $this->integer()->notNull(),
            'title' => $this->string(45)->notNull(),
            'remainder' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%storage_goods_list}}');
    }
}
