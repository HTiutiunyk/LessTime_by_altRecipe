<?php

namespace app\db;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "stages".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property string $description
 * @property integer $order
 * @property Tasks[] $tasks
 */
class Stages extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'title'], 'required'],
            [['project_id', 'order'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 1024],
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
            'title' => 'Title',
            'description' => 'Description',
            'order' => 'Order',
        ];
    }

    public function getTasks() {
        return Tasks::find()
            ->where(['stage_id' => $this->id])
            ->orderBy('priority DESC')
            ->all();
    }
}
