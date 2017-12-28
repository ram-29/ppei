<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblhubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KNOWLEDGE HUB';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-index">

    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-cloud-download"></span> <?= Html::encode($this->title) ?></h3>
    </div>
    <p>
        <?= Html::a('Upload Files', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute'=>'phase_id',
                'headerOptions' => ['style' => 'width:30%'],
                'value'=>'phases.phase'
            ],
            [
             'attribute'=>'hcategory_id',
             'contentOptions'=>['style'=>'max-width: 300px;'],
             'value'=>'categories.category'
            ],
            // [
            //  'attribute'=>'resource_id',
            //  'value'=>'resources.name'
            // ],
            
            'file_name',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
