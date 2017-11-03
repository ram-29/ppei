<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php') ?>

<div class="site-about">

  <section id="about" class="container">
    <div class="row">
      <div class="col-md">
        <h1 class="about-header">
          <i class="fa fa-info-circle" aria-hidden="true"></i>
          About Us
        </h1>

        <a name="who-we-are"></a>
        <h1>Who We Are</h1>
        <p>Poverty and environmental integrity are closely linked. Poor people that depend on natural resources for their livelihood would have limited opportunities if their resources are degraded. A degraded environment lowers productivity and income, thus, rendering the poor to be poorer. The deterioration of the productive capacity of natural resources is perceived as a risk that can affect poverty alleviation initiatives.</p>
        <p>The Philippine Poverty-Environment Initiative (PPEI) supports the government, civil society and the business sector to utilize revenues and benefits from sustainable ENR management for poverty reduction and environmental protection. It aims at demonstrating that, if managed properly and sustainably, natural resources can propel the country to a path of an inclusive and sustainable development.</p>
        <p>The PPEI operates at national and local levels, providing a better enabling environment for national and local government to ensure that ENR revenues are equitably shared by the communities and re-invested to preserve social and natural capital. It seeks to influence institutions, policies and investments to harness the potential of the country’s natural resources to achieve a greener and more inclusive development path.</p>

        <a name="what-we-do"></a>
        <h1>What We Do</h1>

        <a name="stories-of-change"></a>
        <h1>Stories of Change</h1>

        <a name="partners"></a>
        <?= Yii::$app->view->renderFile('@app/views/components/partners.php') ?>
      </div>
    </div>
  </section>
  
</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>
