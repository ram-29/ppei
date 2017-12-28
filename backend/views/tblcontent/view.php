<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcontent */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index', 'feature_id'=>$model->feature_id]];
?>
<div class="tblcontent-view">
    <div class="panel-header-wrapper">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'feature_id',
            'group_id',
            'attribute',
            'value:ntext',
        ],
    ]) */?>
<table class="table table-striped">
    <?php foreach ($values as $val) : ?>
        <tr>
            <th><?= ucfirst($val->attribute); ?></th>
                <th>
                    <?php 

                        if($val->attribute==='images') 
                        {
                            echo Html::img($val->value);
                        }

                        if($val->attribute==='files')
                        {
                            echo  \yii2assets\pdfjs\PdfJs::widget([
                            'width'=>'100%',
                            'height'=>'900px',
                            'url'=> Url::base().'/uploads/'.$val->value
                        ]);
                        }

                        if(($val->attribute !='images') && ($val->attribute !='files'))
                        {
                            echo $val->value;
                        } 
                    ?>
                </th>
        </tr>
    <?php endforeach ?>
</table>
</div>
