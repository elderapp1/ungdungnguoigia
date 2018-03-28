<?php

use yii\db\Migration;

class m130524_201443_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id_login' => $this->primaryKey(),
            'username_login' => $this->string(12)->notNull(),
            'password_login' => $this->string(12)->notNull(),
            'avatar'=>$this->string()->notNull()->defaultValue('defaut_image'),
            'email' => $this->string()->notNull(),
            'date' => $this->string(),
            'introduce' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'block'=>$this->tinyInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);
    }
}
