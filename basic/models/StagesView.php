<?php
namespace app\models;


use yii\base\Model;

class StagesView extends Model {
    public $title;
    public $description;
    public $project_id;
    public $order;
    public $id;

    public function rules()
    {
        return [
            [['title'], 'required'],
            ['title', 'string'],
            ['description', 'string'],
            ['order', 'number']
        ];
    }
}