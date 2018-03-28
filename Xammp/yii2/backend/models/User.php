<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id_login
 * @property string $username_login
 * @property string $password_login
 * @property string $avatar
 * @property string $email
 * @property string $date
 * @property string $introduce
 * @property int $status
 * @property int $block
 * @property string $created_at
 *
 * @property Comment[] $comments
 * @property Game1[] $game1s
 * @property Game2[] $game2s
 * @property LikeInfo[] $likeInfos
 * @property Newfeed[] $newfeeds
 * @property Newfeed[] $newfeeds0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username_login', 'password_login', 'email', 'created_at'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['username_login', 'password_login'], 'string', 'max' => 12],
            [['avatar', 'email', 'date', 'introduce'], 'string', 'max' => 255],
            [['block'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_login' => 'Id Login',
            'username_login' => 'Username Login',
            'password_login' => 'Password Login',
            'avatar' => 'Avatar',
            'email' => 'Email',
            'date' => 'Date',
            'introduce' => 'Introduce',
            'status' => 'Status',
            'block' => 'Block',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_user' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame1s()
    {
        return $this->hasMany(Game1::className(), ['id_user' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame2s()
    {
        return $this->hasMany(Game2::className(), ['id_user' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeInfos()
    {
        return $this->hasMany(LikeInfo::className(), ['id_user' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewfeeds()
    {
        return $this->hasMany(Newfeed::className(), ['id_newfeed' => 'id_newfeed'])->viaTable('{{%like_info}}', ['id_user' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewfeeds0()
    {
        return $this->hasMany(Newfeed::className(), ['id_user' => 'id_login']);
    }
}
