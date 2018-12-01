<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $username
 * @property string $password
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'username', 'password'], 'required'],
            [['nombre', 'email'], 'string', 'max' => 85],
            [['username'], 'string', 'max' => 45],
            ['username', 'unique'],
            [['password'], 'string', 'max' => 75],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
        ];
    }
}
