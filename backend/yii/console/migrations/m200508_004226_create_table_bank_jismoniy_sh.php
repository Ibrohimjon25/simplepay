<?php

use yii\db\Migration;

/**
 * Class m200508_004226_create_table_bank_jismoniy_sh
 */
class m200508_004226_create_table_bank_jismoniy_sh extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        return $this->createTable('bank_jism_sh', [
            'id'=>$this->primaryKey(),
            'org_name'=>$this->text(),
            'firstname'=>$this->text(),
            'lastname'=>$this->text(),
            'father_name'=>$this->text(),
            'email'=>$this->string(),
            'inn'=>$this->string(),
            'passport'=>$this->string(),
            'propiska'=>$this->string(),
            'registration_date'=>$this->string(),
        ]);
    }

    public function down()
    {
        return $this->dropTable('bank_jism_sh');
    }
    
}
