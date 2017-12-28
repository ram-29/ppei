<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblfolderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Folders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfolder-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-folder-open"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Create New Folder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'date',
            //'user_id',
            [
                'attribute' => 'user_id',
                'value' => 'user.fullname'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
