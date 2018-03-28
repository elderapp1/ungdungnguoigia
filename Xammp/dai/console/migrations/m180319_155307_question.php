<?php

use yii\db\Migration;

class m180319_155307 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%game_1}}', [
            'id' => $this->integer(),
            'id_user'=>$this->integer(),
            'status' => $this->string()->notNull()->defaultValue(""),
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
            'id' => $this->integer(),
            'id_user'=>$this->integer(),
            'true_location' => $this->string()->notNull()->defaultValue(""),
            'wrong_location' => $this->string()->notNull()->defaultValue(""),
            'imag'=>$this->string()->notNull(),
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
        $this->addPrimaryKey(
            'quest',
            'game_1',
            ['id', 'id_user']
        );
        $this->addPrimaryKey(
            'quest',
            'game_2',
            ['id', 'id_user']
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
