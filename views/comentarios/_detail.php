<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="panel panel-info">
<div class="panel-heading">
         <h5> <?= Html::encode($model->comentario) ?> </h5>
</div>
<div class="kv-panel-before">         
    Usuario(<?= Html::encode($model->usuario->username) ?>)
</div>
</div>