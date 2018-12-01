<style>
.btn-success {
  font-family: Raleway-SemiBold;
  font-size: 60px;
  color: rgba(103, 192, 103, 0.75);
  letter-spacing: 1px;
  line-height: 15px;
  border: 2px solid rgba(103, 192, 103, 0.75);
  border-radius: 80px;
  background: transparent;
  transition: all 0.3s ease 0s;
}

.btn-success:hover {
  color: #FFF;
  background: rgb(103, 192, 103, 0.75);
  border: 2px solid rgb(103, 192, 103, 0.75);
}
</style>


<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TopicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Topicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div align="right">
        <?= Html::a("", ['create'], ['class' => 'btn btn-success btn-lg glyphicon glyphicon-plus']) ?>        
</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'titulo',
            'contenido',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{actualizar} {eliminar}',
                'buttons' => [
                    'actualizar' => function ($url, $model, $key) {
                        if (Yii::$app->session['idUsuario'] == $model->idUsuario) {
                            return Html::a(
                                '',
                                ['topicos/update', 'id' => $model->id],
                                [
                                    'title'=>'Actualizar',
                                    'class' =>'glyphicon glyphicon-pencil',
                                    'data-method' => 'post',
                                    'data-toggle' => 'tooltip'
                                ]
                            ); 
                        }                       
                    },
                    'eliminar' => function ($url, $model, $key) { 
                        if (Yii::$app->session['idUsuario'] == $model->idUsuario) {                       
                        return Html::a(
                            '',
                            ['topicos/delete', 'id' => $model->id],
                            [
                                'title'=>'Eliminar',
                                'class' =>'glyphicon glyphicon-trash',
                                'data-toggle' => 'tooltip',
                                'data-method' => 'post',
                                'data-confirm' =>'¿desea eliminar el tópico? ',
                            ]
                        );                    
                    }
                    },
                ]
            ],  
        ],
    ]); ?>
</div>
