<?php

use yii\db\Migration;

/**
 * Class m200508_004427_create_table_site_organization
 */
class m200508_004427_create_table_site_organization extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('site_organization', [
            'id'=>$this->primaryKey(),
            'org_name'=>$this->text(),
            'email'=>$this->string(),
            'hisob_raqam'=>$this->string(),
            'category_id'=>$this->integer(),
            'service_name'=>$this->text(),
            'description'=>$this->text(),
            'service_img'=>$this->string(),
            'yuridik_id'=>$this->integer()
        ]);

        $this->addForeignKey('category->site_organization', 'site_organization', 'category_id', 'category', 'id', 'CASCADE');

        $this->addForeignKey('bank_yuridik_sh->site_organization', 'site_organization', 'yuridik_id', 'bank_yuridik_sh', 'id', 'CASCADE');

    }

    public function down()
    {
        return $this->dropTable('site_organization');
    }
    
}
