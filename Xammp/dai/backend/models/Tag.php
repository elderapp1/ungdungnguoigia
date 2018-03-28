<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $suggestions
 * @property int $created_at
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suggestions', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['suggestions'], 'string', 'max' => 255],
            [['suggestions'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'suggestions' => 'Suggestions',
            'created_at' => 'Created At',
        ];
    }
}
