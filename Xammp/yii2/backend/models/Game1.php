<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%game_1}}".
 *
 * @property int $id_question
 * @property int $id_user
 * @property string $status
 * @property string $image
 * @property string $A
 * @property string $B
 * @property string $C
 * @property string $D
 * @property string $answer
 * @property int $correct
 * @property int $wrong
 * @property int $block
 * @property string $created_at
 *
 * @property User $user
 */
class Game1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%game_1}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_question', 'id_user', 'image', 'A', 'B', 'C', 'D', 'answer', 'created_at'], 'required'],
            [['id_question', 'id_user', 'correct', 'wrong'], 'integer'],
            [['created_at'], 'safe'],
            [['status', 'image', 'A', 'B', 'C', 'D'], 'string', 'max' => 255],
            [['answer'], 'string', 'max' => 1],
            [['block'], 'string', 'max' => 3],
            [['id_question', 'id_user'], 'unique', 'targetAttribute' => ['id_question', 'id_user']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_login']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_question' => 'Id Question',
            'id_user' => 'Id User',
            'status' => 'Status',
            'image' => 'Image',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'answer' => 'Answer',
            'correct' => 'Correct',
            'wrong' => 'Wrong',
            'block' => 'Block',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_login' => 'id_user']);
    }
}
