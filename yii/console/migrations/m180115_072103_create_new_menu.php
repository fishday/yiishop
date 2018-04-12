<?php

use yii\db\Migration;

/**
 * Class m180115_072103_create_new_menu
 */
class m180115_072103_create_new_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'left_key' => $this->integer(10)->notNull()->defaultValue(0),
            'right_key' => $this->integer(10)->notNull()->defaultValue(0),
            'level' => $this->integer(10)->notNull()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-menu-left_key',
            'menu',
            'left_key'
        );

        $this->createIndex(
            'idx-menu-right_key',
            'menu',
            'right_key'
        );

        $this->createIndex(
            'idx-menu-level',
            'menu',
            'level'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180115_072103_create_new_menu cannot be reverted.\n";
        $this->dropTable('menu');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180115_072103_create_new_menu cannot be reverted.\n";

        return false;
    }
    */
}
