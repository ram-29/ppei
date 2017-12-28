<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbldatatypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldatatype-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-list"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Add Data Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'dataType',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
