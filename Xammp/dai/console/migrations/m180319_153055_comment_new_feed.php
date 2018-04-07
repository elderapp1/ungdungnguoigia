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
            'id'=>$this->primaryKey(),
            'id' => $this->integer(),
            'id_user' => $this->integer(),
            'status' => $this->string()->notNull(),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);

        $this->alterColumn('{{%comment}}', 'id', $this->Integer().' NOT NULL AUTO_INCREMENT');
        $this->createTable('{{%game_1}}', [
            'id' => $this->primaryKey(),
            'tag' => $this->string()->notNull()->defaultValue(""),
            'image'=>$this->string()->notNull(),
            'A'=>$this->string()->notNull(),
            'B'=>$this->string()->notNull(),
            'C'=>$this->string()->notNull(),
            'D'=>$this->string()->notNull(),
            'answer'=>$this->string(1)->notNull(),
            'correct'=>$this->integer()->defaultValue(0),
            'wrong'=>$this->integer()->defaultValue(0),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);
        $this->createTable('{{%game_2}}', [
            'id' => $this->primaryKey(),
            'true_location' => $this->string()->notNull()->defaultValue(""),
            'wrong_location' => $this->string()->notNull()->defaultValue(""),
            'image'=>$this->string()->notNull(),
            'answer'=>$this->tinyInteger(1)->notNull(),
            'correct'=>$this->integer()->defaultValue(0),
            'wrong'=>$this->integer()->defaultValue(0),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);
        $this->createTable('{{%tag}}', [
            'suggestions' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull()
        ], $tableOptions);

    }


}
