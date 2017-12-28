<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblalbumImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['tblalbum/index']];
$this->params['breadcrumbs'][] = $this->title;

$count=1;
?>
<div class="tblalbum-image-index">
  <div class="panel-header-wrapper">
    <?= Yii::$app->session->getFlash('error'); ?>
      <h3><span class="glyphicon icon glyphicon-picture"></span> <?= Html::encode($this->title) ?></h3>
      <?= Html::a("<span class='glyphicon mini-icon glyphicon-cloud-upload'></span>", ['create', 'id'=>$id]) ?>
    </div>
</div>

<div class="album-wrapper">
    <div class="row">
        <?php foreach($albums as $album) :?>

                       <?php foreach($images as $image) :?>

                          <div class="album-gallery">
                            <?= EasyThumbnailImage::thumbnailImg(
                                'uploads/images/albums/'.$album->name.'/'.$image->image_name, 
                                230,
                                200,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                ['alt' => 'album', 'onclick'=>'openModal('.$count++.')' ]

                            );
                        ?>
                          </div>

                        <?php endforeach ?>

        <?php endforeach ?>
    </div>
</div>
<!-- ['alt' => 'album', 'onclick'=>'openModal('.$count++.')' ]); -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <?php foreach($albums as $album) :?>
        <?php foreach($images as $image) :?>

            <div class="mySlides">
              <div class="text"><?= $album->name; ?></div>
              <?= Html::a("<span class='glyphicon gallery-icon glyphicon-trash'></span>", ['delete', 'id' => $image->id, 'album_id'=>$album->id], [
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
            ]) ?>
              <?= Html::img('uploads/images/albums/'.$album->name.'/'.$image->image_name);?>
            </div>

        <?php endforeach ?>
    <?php endforeach ?>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    
  </div>
</div>

<script>
function openModal(n) {
  document.getElementById('myModal').style.display = "block";
  showSlides(slideIndex = n);
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length)
  {
      slideIndex = 1
  }

  if (n < 1)
  {
    slideIndex = slides.length
  }

  for (i = 0; i < slides.length; i++)
  {
      slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++)
  {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>