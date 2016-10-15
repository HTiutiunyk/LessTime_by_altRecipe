<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/15/16
 * Time: 9:10 PM
 */

namespace app\models;


use yii\base\Model;

class ProjectEdit extends Model {
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title'], 'required'],
            ['title', 'string'],
            ['description', 'string']
        ];
    }
}