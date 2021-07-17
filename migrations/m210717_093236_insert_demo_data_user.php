<?php

use yii\db\Migration;

/**
 * Class m210717_093236_insert_demo_data_user
 */
class m210717_093236_insert_demo_data_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/user.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210717_093236_insert_demo_data_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210717_093236_insert_demo_data_user cannot be reverted.\n";

        return false;
    }
    */
}
