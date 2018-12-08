<?php
use kartik\typeahead\TypeaheadBasic;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1> Lista de temas </h1>

<?php $form = ActiveForm::begin(); ?>
<div class="jumbotron">
<?php          
echo $form->field($model, 'titulo')->widget(TypeaheadBasic::classname(), [
    'data' => $arrData,
    'pluginOptions' => ['highlight' => true],
    'options' => [
        'placeholder' => 'Buscar ...',
        'autocomplete' => 'off'
    ],
]);
?>
<div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), 
        ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>