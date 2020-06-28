<?php

use yii\db\Migration;

/**
 * Class m200508_004347_create_table_plastik_karta
 */
class m200508_004347_create_table_plastik_karta extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('plastik_karta', [
            'id'=>$this->primaryKey(),
            'bank_jism_id'=>$this->integer(),
            'olingan_sana'=>$this->string(),
            'mablag'=>$this->integer()
        ]);

        $this->addForeignKey('bank_jism_shaxs->plastik_karta', 'plastik_karta', 'bank_jism_id', 'bank_jism_sh', 'id', 'CASCADE');
    }

    public function down()
    {
        return $this->dropTable('plastik_karta');
    }
    
}
