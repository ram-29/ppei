<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
use yii\bootstrap\Nav;
use backend\models\Tblcontent;


$this->title = 'PPEI Website';
?>
<div class="site-index">

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel-header-wrapper"><h3><div class="glyphicon icon glyphicon-dashboard"></div> Dashboard</h3></div>
       
            <div class="dashboard-wrapper">
                        <div class="dashboard-panel-content">

                        <?php if(\Yii::$app->user->can('manageUsers')) : ?>
                            <div class="dashboard-menu">
                                <?= Html::a(Html::img('images/icon-user.png', ['class' => 'img']), ["user/admin/index"]); ?>
                                <div class="desc">Manage User</div>
                            </div>
                        <?php endif ?>

                            <div class="dashboard-menu">
                                <?= Html::a(Html::img('images/icon-folder.png', ['class' => 'img']), ["tblfolder/index"]); ?>
                                <div class="desc">Admin Folder</div>
                            </div>

                            <div class="dashboard-menu">
                                <?= Html::a(Html::img('images/features.png', ['class' => 'img']), ["tblfeature/index"]); ?>
                                <div class="desc">Web Features</div>
                            </div>

                            <div class="dashboard-menu">
                                <?= Html::a(Html::img('images/attributes.png', ['class' => 'img']), ["tblattribute/index"]); ?>
                                <div class="desc">Attributes</div>
                            </div>

                            <div class="dashboard-menu">
                                <?= Html::a(Html::img('images/gallery.png', ['class' => 'img']), ["tblalbum/index"]); ?>
                                <div class="desc">Photo Gallery</div>
                            </div>
                        
                        </div>
            </div>

            <div class="panel-header-wrapper"><h3><div class="glyphicon icon glyphicon-calendar"></div> Upcoming Events</h3>
            </div>

            <div class="dashboard-wrapper">
                
                        <div class="activiy-wrapper">
                        
                                <div class="calendar-date">
                                    Dec. 12, 2017
                                </div>
                        

                                <div class="calendar-title">
                                    This is a Sample Activity title
                                </div>
                            
                                <div class="calendar-content">
                                    This is a sample activity description. 
                                </div>
                          
                        </div>
                
            </div>
        
        </div>     
    </div>
</div>

