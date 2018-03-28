<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%newfeed}}".
 *
 * @property int $id_newfeed
 * @property int $id_user
 * @property string $status
 * @property string $image
 * @property int $block
 * @property string $created_at
 *
 * @property Comment[] $comments
 * @property LikeInfo[] $likeInfos
 * @property User[] $users
 * @property User $user
 */
class Newfeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newfeed}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'created_at'], 'required'],
            [['id_user'], 'integer'],
            [['created_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 12],
            [['block'], 'string', 'max' => 3],
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
            'status' => 'Status',
            'image' => 'Image',
            'block' => 'Block',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_newfeed' => 'id_newfeed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeInfos()
    {
        return $this->hasMany(LikeInfo::className(), ['id_newfeed' => 'id_newfeed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_login' => 'id_user'])->viaTable('{{%like_info}}', ['id_newfeed' => 'id_newfeed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_login' => 'id_user']);
    }
}
