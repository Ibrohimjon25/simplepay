<?php

use yii\db\Migration;

/**
 * Class m200508_004357_create_table_category
 */
class m200508_004357_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        return $this->createTable('category', [
            'id'=>$this->primaryKey(),
            'name'=>$this->text(),
            'img'=>$this->string()
        ]);
    }

    public function down()
    {
        return $this->dropTable('category');
    }
    
}
