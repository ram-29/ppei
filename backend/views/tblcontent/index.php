<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Tblcontent;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcontentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcontent-index">
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-list"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Add Content', ['create', 'feature_id' => $feature_id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'feature_id',
            //'group_id',
            //  [
            //     'attribute' => 'group_id',
            //     'value' => 'MergeRows',
                
            // ],
            //'attribute',
            // [
            //     'attribute' => 'attribute',
            //     'value' => function($data2)
            //     {

            //         $att= $data2->attribute;
            //         return ucfirst($att);
                
            //     }
            // ],
            [
                'attribute' => 'value',
                'format' => 'Html',
                'contentOptions'=>['style'=>'max-width: 700px;'],
                'value' => function ($data)
                {
                    $x = Tblcontent::find(['value'])->where(['group_id' => $data->group_id])->andWhere(['attribute' => 'title'])->one();
                  
                    $val = $data->attribute === 'title' ? $data->value : sizeof($x) > 0 ? $x->value : $data->value;
                 
                    return mb_strimwidth($val, 0, 90, ' ...');
                }
            ],

            [   
                    'label' => 'Date',
                    'attribute' => 'date',
                    'format' => 'Html',
                    'visible' => ($vis),
                    'value' => function($data2){
                        $val = Tblcontent::find(['value'])->where(['group_id' => $data2->group_id])->andWhere(['attribute' => 'date'])->one();

                        return $val->value;
                    }
            ],
            //'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
