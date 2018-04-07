<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%game_2}}".
 *
 * @property int $id
 * @property string $true_location
 * @property string $wrong_location
 * @property string $image
 * @property int $answer
 * @property int $correct
 * @property int $wrong
 * @property int $block
 * @property string $created_at
 */
class Game2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%game_2}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'image', 'answer', 'created_at'], 'required'],
            [['id', 'correct', 'wrong'], 'integer'],
            [['created_at'], 'safe'],
            [['true_location', 'wrong_location', 'image'], 'string', 'max' => 255],
            [['answer'], 'string', 'max' => 1],
            [['block'], 'string', 'max' => 3],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'true_location' => 'True Location',
            'wrong_location' => 'Wrong Location',
            'image' => 'Image',
            'answer' => 'Answer',
            'correct' => 'Correct',
            'wrong' => 'Wrong',
            'block' => 'Block',
            'created_at' => 'Created At',
        ];
    }
}
