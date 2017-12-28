<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblhubPhaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program Phases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-phase-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <p>
        <?= Html::a('Add Program Phase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'phase',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
