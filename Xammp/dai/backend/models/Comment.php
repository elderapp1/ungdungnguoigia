<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id_comment
 * @property int $id_newfeed
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
            [['id_newfeed', 'id_user'], 'integer'],
            [['status', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['block'], 'string', 'max' => 3],
            [['id_newfeed'], 'exist', 'skipOnError' => true, 'targetClass' => Newfeed::className(), 'targetAttribute' => ['id_newfeed' => 'id_newfeed']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_login']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comment' => 'Id Comment',
            'id_newfeed' => 'Id Newfeed',
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
        return $this->hasOne(Newfeed::className(), ['id_newfeed' => 'id_newfeed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_login' => 'id_user']);
    }
}
