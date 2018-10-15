<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "tutorial_category".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $category
 */
class TutorialCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorial_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category'], 'required'],
            [['user_id'], 'integer'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category' => 'Category',
        ];
    }
}
