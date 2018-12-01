<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Topicos */

$this->title = Yii::t('app', 'Update Topicos') ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Topicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="topicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
