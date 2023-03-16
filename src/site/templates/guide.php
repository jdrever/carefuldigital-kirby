<?php snippet('header') ?>
<div class="card-container">
  <div class="card-content">
  <h1><?=$page->title()?></h1>
  <?php if($image = $page->image()): ?>
  <img class="img-thumbnail" src="<?= $image->url() ?>" alt="" width="250" height="250">
  <?php endif ?>
  <p class="lead"><?=$page->description()?></p>
  </div>
</div>
  <?php snippet('show-blocks') ?>
  <?php snippet('guide-navigation') ?>
<?php snippet('footer') ?>