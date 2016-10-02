<?php

namespace app\db;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 * @property string $soft_deadline
 * @property string $hard_deadline
 * @property integer $estimated_time
 * @property integer $actual_time
 * @property integer $priority
 * @property  integer $stage_id
 */
class Tasks extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['user_id', 'estimated_time', 'actual_time', 'priority'], 'integer'],
            [['soft_deadline', 'hard_deadline'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'user_id' => 'User ID',
            'soft_deadline' => 'Soft Deadline',
            'hard_deadline' => 'Hard Deadline',
            'estimated_time' => 'Estimated Time',
            'actual_time' => 'Actual Time',
            'priority' => 'Priority',
        ];
    }
}
