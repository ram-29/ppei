<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblfeatureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Feature';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfeature-index">
    
    <div class="panel-header-wrapper">
        <?= Yii::$app->session->getFlash('error'); ?>
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Add Feature', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'feature',
            [
                'attribute' => 'attributes',
                'format' => 'html',
                'contentOptions'=>['style'=>'min-width: 400px;'],
                'value' => function($data)
                {

                    $arr =  unserialize($data->attributes);
                    $str = '';

                    foreach ($arr as $key => $value)
                    {
                         //echo $str .= $key." : ".$value.PHP_EOL;
                        $val = mb_strimwidth($value, 0, 60, ' ...');
                        $str .= $key.', ';
                    }
                    return ucwords($str);
                }
            ],
            //'attributes',
            // 'isVisible',
            [
                'attribute' => 'isVisible',
                'value' => function($data)
                {   
                    $vis = '';
                    if($data->isVisible == '1')
                    {
                        $vis = 'Yes';
                    }
                    else
                    {
                        $vis = 'No' ;
                    }

                    return $vis; 
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
