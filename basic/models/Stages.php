<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stages".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property string $description
 * @property integer $order
 */
class Stages extends \yii\db\ActiveRecord
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
}
