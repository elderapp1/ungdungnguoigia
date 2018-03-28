<?php

use yii\db\Migration;

class m180319_153055_comment_new_feed extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comment}}', [
            'id_comment'=>$this->primaryKey(),
            'id_newfeed' => $this->integer(),
            'id_user' => $this->integer(),
            'status' => $this->string()->notNull(),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);

        $this->alterColumn('{{%comment}}', 'id_comment', $this->Integer().' NOT NULL AUTO_INCREMENT');
    }


}
