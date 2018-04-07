<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property int $id
 * @property int $id_user
 * @property string $status
 * @property int $block
 * @property string $created_at
 *
 * @property Newfeed $newfeed
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['status', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['block'], 'string', 'max' => 3],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Newfeed::className(), 'targetAttribute' => ['id' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Comment',
            'id' => 'Id Newfeed',
            'id_user' => 'Id User',
            'status' => 'Status',
            'block' => 'Block',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewfeed()
    {
        return $this->hasOne(Newfeed::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
