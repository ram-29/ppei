<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\TblalbumImage;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblalbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalbum-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-picture"></span> <?= Html::encode($this->title) ?></h3>
    </div>
    <p>
        <?= Html::a('Create Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'name',
            //'event_date',

            [
                'attribute' => 'name',
                'format' => 'Html',
                'contentOptions'=>['style'=>'max-width: 600px;'],
                'value' => function($data){

                   return mb_strimwidth($data->name, 0, 70, ' ...');
                }
            ],
            'user_id',
            // [
            //   'attribute' => 'user_id',
            //   'format' => 'Html',
            //   'contentOptions'=>['style'=>'max-width: 200px;'],
            //   'value' => 'user.fullname',
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>
