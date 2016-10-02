<?php

namespace app\models;

use yii\base\Model;

class TaskCreation extends Model
{
    public $title;
    public $description;
    public $priority;

    public function rules()
    {
        return [
            [['title', 'priority'], 'required'],
            ['title', 'string'],
            ['priority', 'number'],
            ['description', 'string']
        ];
    }
}