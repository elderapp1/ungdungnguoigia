<?php

use yii\db\Migration;

/**
 * Class m180320_154544_foreignkey
 */
class m180320_154544_foreignkey extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-user-comment',
            'comment',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-newfeed-comment',
            'comment',
            'id',
            'newfeed',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user-newfeed',
            'newfeed',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-newfeed-like',
            'likeinfo',
            'id',
            'newfeed',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-user-like',
            'likeinfo',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('foreign_key');
    }

}
