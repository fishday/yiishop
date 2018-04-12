<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180116_001858_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('product', [
            'id' => $this->bigPrimaryKey(),
            'category_id' => $this->bigInteger()->notNull(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(1000)->notNull(),
            'price' => $this->decimal(9, 2)->notNull(),
            'image' => $this->string(50)->notNull(),
            'status' => $this->boolean()->defaultValue(TRUE),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
