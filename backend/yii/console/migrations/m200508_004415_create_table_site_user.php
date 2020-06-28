<?php

use yii\db\Migration;

/**
 * Class m200508_004415_create_table_site_user
 */
class m200508_004415_create_table_site_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('site_user', [
            'id'=>$this->primaryKey(),
            'firstname'=>$this->text(),
            'lastname'=>$this->text(),
            'phone_number'=>$this->string(),
            'karta_id'=>$this->integer(),
            'jism_id'=>$this->integer()
        ]);

        $this->addForeignKey('bank_jism_shaxs->site_user', 'site_user', 'jism_id', 'bank_jism_sh', 'id', 'CASCADE');

        $this->addForeignKey('plastik_karta->site_user', 'site_user', 'karta_id', 'plastik_karta', 'id', 'CASCADE');

    }

    public function down()
    {
        return $this->dropTable('site_user');
    }
    
}
