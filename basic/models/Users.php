<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $job_id
 * @property string $phone_number
 * @property string $full_name
 * @property string $contacts
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['job_id'], 'integer'],
            [['contacts'], 'string'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 50],
            [['full_name'], 'string', 'max' => 128],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'job_id' => 'Job ID',
            'phone_number' => 'Phone Number',
            'full_name' => 'Full Name',
            'contacts' => 'Contacts',
        ];
    }
}
