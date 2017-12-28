<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfeature */

$this->title = $model->feature;
$this->params['breadcrumbs'][] = ['label' => 'Web Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfeature-view">
    <span class="glyphicn glyphicn-plus"></span>
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Caution: If you delete this feature, all its contents will also be deleted. Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'feature',
            [
                'attribute' => 'attributes',
                'format' => 'html',
                'contentOptions'=>['style'=>'max-width: 100px;'],
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
        ],
    ]) ?>

</div>
