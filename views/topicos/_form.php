<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topicos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'contenido')->textarea(['rows'=>4, 'style'=>'width:50%;'])  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
