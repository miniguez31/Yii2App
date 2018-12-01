<?Php
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {

            $.pjax.reload({container:"#comments"});
        });
    });'
);
?>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>
<?php yii\widgets\Pjax::begin(['id' => 'new_comment']) ?>
<div class="comentarios-form">
    
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <?= $form->field($model, 'comentario')->textarea(['rows'=>4, 'style'=>'width:50%;'])  ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php yii\widgets\Pjax::end() ?>
