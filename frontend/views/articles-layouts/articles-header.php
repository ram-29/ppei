<h1 class="articles-header">
  <?php if($feature === 'News and Events') :?>
    <i class="fa fa-newspaper-o" aria-hidden="true"></i> <?= $feature ?>
  <?php elseif($feature === 'Stories of Change') :?>
    <i class="fa fa-bullhorn" aria-hidden="true"></i> <?= $feature ?>
  <?php endif ?>
</h1>