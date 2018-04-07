<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%game_1}}".
 *
 * @property int $id
 * @property string $tag
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
            [['id', 'image', 'A', 'B', 'C', 'D', 'answer', 'created_at'], 'required'],
            [['id', 'correct', 'wrong'], 'integer'],
            [['created_at'], 'safe'],
            [['tag', 'image', 'A', 'B', 'C', 'D'], 'string', 'max' => 255],
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
            'tag' => 'Tag',
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
}
