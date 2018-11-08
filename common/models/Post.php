<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 * @property int $post_type_id
 *
 * @property PostType $postType
 * @property User $createdBy
 * @property User $updatedBy
 */

/**
 * @SWG\Definition(
 *   definition="CreatePost",
 *   type="object",
 *   required={"title", "content"},
 *   @SWG\Property(property="title", type="string"),
 *   @SWG\Property(property="content", type="string")
 * )
 */
/**
 * @SWG\Definition(
 *   definition="UpdatePost",
 *   type="object",
 *   required={"title", "content"},
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/CreatePost"),
 *   }
 * )
 */
/**
 * @SWG\Definition(
 *   definition="Post",
 *   type="object",
 *   required={"title", "content"},
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/CreatePost"),
 *       @SWG\Schema(
 *           required={"id"},
 *           @SWG\Property(property="id", format="int64", type="integer")
 *       )
 *   }
 * )
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'post_type_id'], 'required'],
            [['description'], 'string'],
            [['created_by', 'created_at', 'updated_by', 'updated_at', 'post_type_id'], 'integer'],
            [['name'], 'string', 'max' => 300],
            [['post_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostType::className(), 'targetAttribute' => ['post_type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'post_type_id' => 'Post Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostType()
    {
        return $this->hasOne(PostType::className(), ['id' => 'post_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
