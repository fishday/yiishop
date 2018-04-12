<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m180115_193541_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            //'tree' => $this->integer()->notNull(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'url' => $this->string(100)->notNull(),
            'description' => $this->string(1000)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('menu');
    }
}
