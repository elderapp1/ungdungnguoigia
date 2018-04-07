<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%newfeed}}".
 *
 * @property int $id
 * @property int $id_user
 * @property string $status
 * @property string $image
 * @property int $block
 * @property string $created_at
 *
 * @property Comment[] $comments
 * @property Likeinfo[] $likeInfos
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
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Newfeed',
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
        return $this->hasMany(Comment::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeInfos()
    {
        return $this->hasMany(Likeinfo::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('{{%likeinfo}}', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
