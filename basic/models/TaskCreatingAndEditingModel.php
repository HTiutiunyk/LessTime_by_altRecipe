<?php

namespace app\models;

use yii\base\Model;

class TaskCreatingAndEditingModel extends Model
{
    public $title;
    public $description;
    public $priority;
    public $user_id;

    public function rules()
    {
        return [
            [['title', 'priority'], 'required'],
            ['title', 'string'],
            ['priority', 'number', 'max' => 10, 'min' => 1],
            ['user_id', 'number'],
            ['description', 'string']
        ];
    }
}