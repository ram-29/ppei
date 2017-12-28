<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblattributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblattribute-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Add Attribute', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'attribute',
            'data_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
