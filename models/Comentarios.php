<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comentarios".
 *
 * @property int $id
 * @property string $comentario
 * @property string $fecha
 * @property int $idTopico
 * @property int $idUsuario
 *
 * @property Topicos $topico
 * @property Usuarios $usuario
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comentario', 'fecha', 'idTopico', 'idUsuario'], 'required'],
            [['fecha'], 'safe'],
            [['idTopico', 'idUsuario'], 'integer'],
            [['comentario'], 'string', 'max' => 255],
            [['idTopico'], 'exist', 'skipOnError' => true, 'targetClass' => Topicos::className(), 'targetAttribute' => ['idTopico' => 'id']],
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
            'comentario' => Yii::t('app', 'Comentario'),
            'fecha' => Yii::t('app', 'Fecha'),
            'idTopico' => Yii::t('app', 'Id Topico'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopico()
    {
        return $this->hasOne(Topicos::className(), ['id' => 'idTopico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'idUsuario']);
    }
}
