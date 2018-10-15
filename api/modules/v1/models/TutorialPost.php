<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "tutorial_post".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 * @property integer $hit
 */
class TutorialPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorial_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content', 'status', 'author_id'], 'required'],
            [['category_id', 'status', 'create_time', 'update_time', 'author_id', 'hit'], 'integer'],
            [['content', 'tags'], 'string'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'tags' => 'Tags',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author ID',
            'hit' => 'Hit',
        ];
    }
}
