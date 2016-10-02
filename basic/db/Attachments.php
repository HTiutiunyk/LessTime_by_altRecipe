<?php

namespace app\db;

use Yii;

/**
 * This is the model class for table "attachments".
 *
 * @property string $title
 * @property string $path
 * @property string $table_name
 * @property integer $row_id
 * @property integer $id
 */
class Attachments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'path', 'table_name', 'row_id'], 'required'],
            [['path'], 'string'],
            [['row_id'], 'integer'],
            [['title', 'table_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'path' => 'Path',
            'table_name' => 'Table Name',
            'row_id' => 'Row ID',
            'id' => 'ID',
        ];
    }
}
