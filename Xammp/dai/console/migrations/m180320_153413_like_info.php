<?php

use yii\db\Migration;

/**
 * Class m180320_153413_like_info
 */
class m180320_153413_like_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%like_info}}', [
            'id_newfeed' => $this->integer(),
            'id_user' => $this->integer(),
            'created_at' => $this->dateTime(),
        ], $tableOptions);
        $this->addPrimaryKey(
            'like',
            'like_info',
            ['id_newfeed', 'id_user']
        );


    }


}
