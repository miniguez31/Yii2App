<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->title = Yii::t('app', 'Create Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'style'=>'width:50%;']) ?>
    
    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true, 'style'=>'width:50%;']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>