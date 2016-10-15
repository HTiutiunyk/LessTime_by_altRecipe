<?php

namespace app\db;

use Yii;

/**
 * This is the model class for table "project_users".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property int is_pm
 */
class ProjectUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
        ];
    }
}
