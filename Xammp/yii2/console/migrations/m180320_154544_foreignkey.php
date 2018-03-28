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
            'id_login',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-newfeed-comment',
            'comment',
            'id_newfeed',
            'newfeed',
            'id_newfeed',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user-newfeed',
            'newfeed',
            'id_user',
            'user',
            'id_login',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-user-game1',
            'game_1',
            'id_user',
            'user',
            'id_login',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-user-game2',
            'game_2',
            'id_user',
            'user',
            'id_login',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-newfeed-like',
            'like_info',
            'id_newfeed',
            'newfeed',
            'id_newfeed',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-user-like',
            'like_info',
            'id_user',
            'user',
            'id_login',
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
