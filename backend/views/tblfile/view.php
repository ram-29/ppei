<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Tblfile;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfile */

$this->title = 'File';
$this->params['breadcrumbs'][] = ['label' => 'Folders', 'url' => ['tblfile/index', 'folder_id'=>$folder_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Download', ['download', 'id' => $file_id, 'folder_id'=>$folder_id], [
            'class' => 'btn btn-success',
                ]) ?>

        <?= Html::a('Delete', ['delete', 'id' => $file_id, 'folder_id'=>$folder_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'folder_id',
        ],
    ]) */?>

    <?php

        foreach ($files as $file)
        {
            $fileName = $file->name;
        }
        
       // $fileType = $fileName->extension;
        $path_parts = pathinfo('/uploads/adminfolder/'.$fileName);

        $fileType = $path_parts['extension'];
        
        ?>

        <?php if($fileType==='pdf') : ?>
        
        <?=  \yii2assets\pdfjs\PdfJs::widget([
                'width'=>'100%',
                'height'=>'1000px',
                'url'=> Url::base().'/uploads/adminfolder/'.$fileName
                ]); ?>

        <?php elseif(($fileType==='gif') || ($fileType==='png') || ($fileType==='jpg')) : ?>
        
        <table>
            <tr>
                <td><?= Html::img('uploads/adminfolder/'. $fileName, ['width'=>'300']); ?></td>
            </tr>
        </table>

        <?php else : ?>
       
        <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'folder_id',
                    ],
            ]); ?>
        
        <?php endif ?>

   

</div>
