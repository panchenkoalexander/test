<?php

use yii\db\Migration;

class m161123_130047_user extends Migration
{
    public function up()
    {
        $this->createTable('user',[
             
            'id' => $this->primaryKey(),
            'cityId' => $this->integer(8),
            'cityId'=>$this->integer(8),
            'name'=>$this->string(50),
            'lastname'=>$this->string(50),
            'email'=>$this->string(100),
            'phone'=>$this->string(13),
            'password'=>$this->string(64),
            'isActive'=> $this->integer(4)->notNull()->defaultValue(1),
            'lastLoginAt'=> $this->datetime(),
            'updatedAt'=> $this->datetime(),
            'createdAt'=> $this->datetime()
            

            ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
