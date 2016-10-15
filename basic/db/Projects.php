<?php

namespace app\db;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property Stages[] stages
 */
class Projects extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 256],
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
        ];
    }

    public function getStages() {
        return Stages::find()
            ->where(['project_id' => $this->id])
            ->orderBy('order')
            ->all();
    }

    public function getPm() {
        $projectUsersPm = ProjectUsers::findOne(['project_id' => $this->id, 'is_pm' => 1]);
        return Users::findOne(['id' => $projectUsersPm->user_id]);
    }
}
