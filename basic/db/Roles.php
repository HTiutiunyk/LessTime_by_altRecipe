<?php

namespace app\db;

use yii\db\ActiveRecord;
use yii\web\User;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property string $title
 * @property string $system_tag
 */
class Roles extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'system_tag'], 'string', 'max' => 128],
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
            'system_tag' => 'System Tag',
        ];
    }

    public function getUsers() {
        /** @var UserRoles[] $userRoles */
        $userRoles = UserRoles::find()
            ->where(['role_id' => $this->id])
            ->all();

        $users = [];
        foreach ($userRoles as $userRole) {
            $users[] = Users::findOne($userRole->user_id);
        }
        return $users;
    }
}
