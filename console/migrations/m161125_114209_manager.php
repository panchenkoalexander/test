<?php

use yii\db\Migration;

class m161125_114209_manager extends Migration
{
    public function up()
    {
        $this->createTable('manager',[
             
            'id' => $this->primaryKey(),
            'level' => $this->integer(4),
            'name' => $this->string(250),
            'lastname' => $this->string(250),
            'email' => $this->string(100),
            'phone'=>$this->string(20),
            'password'=>$this->string(64),
            'createdAt'=>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updatedAt'=>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')



            ]);
    }

    public function down()
    {
        echo "m161125_114209_manager cannot be reverted.\n";

        return false;
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
