<?php

use yii\db\Migration;

class m170610_134317_create_table_hotel_rooms extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%hotel_room}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->null(),
            'short_description' => $this->string(255)->null(),
            'description' => $this->text()->null(),
            'thumbnail' => $this->string(255)->null(),
            'price' => $this->integer(4)->notNull()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%hotel_room}}');
    }
}