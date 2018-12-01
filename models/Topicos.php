<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Topicos".
 *
 * @property int $id
 * @property string $titulo
 * @property string $contenido
 * @property int $idUsuario
 */
class Topicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Topicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'contenido', 'idUsuario'], 'required'],
            [['idUsuario'], 'integer'],
            [['titulo'], 'string', 'max' => 145],
            [['contenido'], 'string', 'max' => 245],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idUsuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'contenido' => Yii::t('app', 'Contenido'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'idUsuario']);
    }
}
