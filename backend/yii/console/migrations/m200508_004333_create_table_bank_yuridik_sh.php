<?php

use yii\db\Migration;

/**
 * Class m200508_004333_create_table_bank_yuridik_sh
 */
class m200508_004333_create_table_bank_yuridik_sh extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        return $this->createTable('bank_yuridik_sh', [
            'id'=>$this->primaryKey(),
            'org_name'=>$this->text(),
            'boss_fio'=>$this->text(),
            'email'=>$this->string(),
            'inn'=>$this->string(),
            'passport'=>$this->string(),
            'registration_date'=>$this->string(),
            'hisob_raqam'=>$this->string(),
            'mablag'=>$this->integer()
        ]);
    }

    public function down()
    {
        return $this->dropTable('bank_yuridik_sh');
    }
    
}
