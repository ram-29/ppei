<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\BootstrapAsset;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/images/logo.ico']);?>
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode('PPEI Website - '.$this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="topnav" id="myTopnav">

                <!-- <div class="topnav-datetime"><strong><?= date('l'); ?></strong></br><?= date('M-d-Y'); ?></div> -->

                <?= Html::img('images/logo.png', ['class' => 'logo', 'alt'=>'PPEI Logo']);?>

                <div class="heading-title">Philippine Poverty Environment Initiative</div>

                 <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a> 
                    <?php 

                        if (!Yii::$app->user->isGuest) 
                        {
                            $menuItems[] = '<li>'
                            . Html::beginForm(['/site/search'], 'post')
                            . Html::submitButton(
                            Html::img("images/search.png", ["class" => "user-icon", "alt"=>"search Icon"]).' Search',
                                ['class' => 'topnav navbar-option'])
                            . Html::endForm()
                            . '</li>';

                            $menuItems[] = '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                            Html::img("images/logout-icon.png", ["class" => "user-icon", "alt"=>"user Icon"]).' Logout',
                                ['class' => 'topnav navbar-option'])
                            . Html::endForm()
                            . '</li>';

                            $menuItems[] = '<li>'
                            . Html::beginForm(['/user/account'], 'post')
                            . Html::submitButton(
                            Html::img("images/user.png", ["class" => "user-icon", "alt"=>"user Icon"]).' '.Yii::$app->user->identity->fullname,
                                ['class' => 'topnav navbar-option'])
                            . Html::endForm()
                            . '</li>';


                            echo Nav::widget([
                                'items' => $menuItems,
                            ]);
                    
                        }
                        
                    ?>
    </div>

    <div class="top-banner" data-spy="affix" data-offset-top="60">

        <?= Html::img('images/ppei-admin.png', ['class' => 'img']);?>

                <?php if(!Yii::$app->user->isGuest) {

                        echo Nav::widget([

                            'items' => [

                                [
                                    'label' => '<span class="glyphicon icon glyphicon-envelope"></span></br>Message ',
                                    'url' => ['/tblmessage/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],

                                [
                                    'label' => '<span class="glyphicon icon glyphicon-folder-close"></span></br>Admin Folder',
                                    'url' => ['/tblfolder/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],

                                [
                                    'label' => '<span class="glyphicon icon glyphicon-list"></span></br>Data Type',
                                    'url' => ['/tbldatatype/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],


                                [
                                    'label' => '<span class="glyphicon icon glyphicon-plus"></span></br>Attributes',
                                    'url' => ['/tblattribute/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],

                                [
                                    'label' => '<span class="glyphicon icon glyphicon-cog"></span></br>Features',
                                    'url' => ['/tblfeature/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],


                                [
                                    'label' => '<span class="glyphicon icon glyphicon-dashboard"></span></br>Dashboard',
                                    'url' => ['/site/index'],
                                    'linkOptions' => ['class'=>'menutext'],
                                ],

                                ],
                            'options' => ['class' =>'topnav-menu'], // set this to nav-tab to get tab-styled
                            'encodeLabels' => false,

                        ]);

                     } ?>
    </div>

    <div class="container-fluid"> 
             <!-- Sidebar -->
        <div class="row">
            <div class="content-wrapper">
            <?php if(!Yii::$app->user->isGuest) : ?>
                 <div class="col-lg-3">
                    <div class="sidebar-menu" id= "side" data-spy="affix" data-offset-top="60">

                            <?php foreach ($features as $feature) : ?>
                                <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span>'. $feature->feature, ["/tblcontent/index", 'feature_id'=>$feature->id], ['class' => 'menu-navigation']); ?>
                            <?php endforeach ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Knowledge Hub', ["/tblhub/index"], ['class' => 'menu-navigation']); ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Photo Gallery', ["/tblalbum/index"], ['class' => 'menu-navigation']); ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Admin Folder', ["/tblfolder/index"], ['class' => 'menu-navigation']); ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Program Phase', ["/tblhub-phase/index"], ['class' => 'menu-navigation']); ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Knowledge Hub categories', ["/tblhub-category/index"], ['class' => 'menu-navigation']); ?>

                            <?= Html::a('<span class="glyphicon icon glyphicon-chevron-right" ></span> Knowledge Hub Resource Type', ["/tblhubresource/index"], ['class' => 'menu-navigation']); ?>

                    </div>
                 </div>
            <?php endif ?>
             <!-- Page content --> 

                 <div class="col-lg-9">
                    <?php 
                        if (!Yii::$app->user->isGuest) {
                            echo Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]);
                                }
                    ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                 </div>
        </div>
     </div> 
</div>

<!---Menu Toggle Script-->
<script> 
         $("#menu-toggle").click( function (e){ 
             e.preventDefault(); 
             $("#wrapper").toggleClass("menuDisplayed"); 
         }); 
</script> 
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
