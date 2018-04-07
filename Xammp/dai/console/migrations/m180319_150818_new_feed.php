<?php

use yii\db\Migration;

class m180319_150818_new_feed extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%newfeed}}', [
            'id' => $this->integer(),
            'id_user'=> $this->integer(),
            'status' => $this->string()->defaultValue(""),
            'image' => $this->string(12)->notNull()->defaultValue("null"),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);
        $this->addPrimaryKey(
            'nf',
            'newfeed',
            ['id', 'id_user']
        );
        $this->alterColumn('{{%newfeed}}', 'id', $this->Integer().' NOT NULL AUTO_INCREMENT');

    }
}
