<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%like_info}}".
 *
 * @property int $id_newfeed
 * @property int $id_user
 * @property string $created_at
 *
 * @property Newfeed $newfeed
 * @property User $user
 */
class LikeInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%like_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_newfeed', 'id_user'], 'required'],
            [['id_newfeed', 'id_user'], 'integer'],
            [['created_at'], 'safe'],
            [['id_newfeed', 'id_user'], 'unique', 'targetAttribute' => ['id_newfeed', 'id_user']],
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
            'id_newfeed' => 'Id Newfeed',
            'id_user' => 'Id User',
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
