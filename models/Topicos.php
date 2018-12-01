<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Topicos".
 *
 * @property int $id
 * @property string $titulo
 * @property string $contenido
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
            [['titulo', 'contenido'], 'required'],
            [['titulo'], 'string', 'max' => 145],
            [['contenido'], 'string', 'max' => 245],
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
}
