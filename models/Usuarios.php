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
 * 
 * @property Topicos[] $topicos
 */
class Usuarios extends \yii\db\ActiveRecord
{
    public $repassword;
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
            [['password', 'repassword'], 'string', 'max' => 75],
            ['email', 'email'],
            [
                'repassword', 
                'compare', 
                'compareAttribute'=>'password', 
                'message'=> Yii::t('app', 'El password no coincide') 
            ],
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
            'repassword' => Yii::t('app', 'RePassword'),
        ];
    }

    public function cifrarPassword()
    {
        $passwordHash = password_hash(
            $this->password,
            PASSWORD_BCRYPT,
            array(
               'cost' => 10
            )
        );
        return $passwordHash;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicos()
    {
        return $this->hasMany(Topicos::className(), ['idUsuario' => 'id']);
    }
}
