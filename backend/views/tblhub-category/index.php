<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblhubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Knowledge Hub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-category-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><?= Html::encode($this->title) ?></h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <p>
        <?= Html::a('Add Hub Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category',
             [
                'attribute'=>'id_phase',
                'value'=>'phases.phase',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
