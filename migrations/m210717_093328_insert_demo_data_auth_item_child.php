<?php

use yii\db\Migration;

/**
 * Class m210717_093328_insert_demo_data_auth_item_child
 */
class m210717_093328_insert_demo_data_auth_item_child extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/auth_item_child.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210717_093328_insert_demo_data_auth_item_child cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210717_093328_insert_demo_data_auth_item_child cannot be reverted.\n";

        return false;
    }
    */
}
