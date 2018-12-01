<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Create Comentarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Topicos'), 'url' => ['topicos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($modelTopico->titulo) ?></h1>

<?= $this->render('_form', [
        'model' => $model,
]) ?> 

<?php \yii\widgets\Pjax::begin(['id' => 'comments']); ?>
<?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_detail',
    ]);
?>
<?php yii\widgets\Pjax::end() ?>

