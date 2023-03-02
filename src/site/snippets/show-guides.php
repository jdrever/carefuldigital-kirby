<?php
if (!isset($templateName))
{
  $templateName="guide";
}

if (!isset($showTitle))
{
  $showTitle="Guides";
}
?>
<?php if (count($page->children()->filterBy('template',$templateName))>0) :
?>

<h2><?= $showTitle ?></h2>
<div class="card-group">
  <?php foreach ($page->children()->filterBy('template',$templateName) as $guide) :  ?>
  <div class="card-container">
    <div class="card-content">
      <h3><?= $guide->title() ?></h3>
    <?php if($image = $guide->image()): ?>
      <img src="<?= $image->url() ?>" alt="" width="250" height="250">
    <?php endif ?>
    </div>
    <?= $guide->description()->kt() ?>
    <a href="<?=$guide->url()?>" class="card-button">START THE GUIDE &rarr;</a>
  </div>
  <?php endforeach ?>
</div>
<?php endif ?>