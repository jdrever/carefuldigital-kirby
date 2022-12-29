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
<div class="container bg-light p-4">
  <h2><?= $showTitle ?></h2>
  <div class="container px-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($page->children()->filterBy('template',$templateName) as $guide) :  ?>
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="card-text"><?= $guide->title() ?></h3>
          <?php if($image = $guide->image()): ?>
          <img class="img-thumbnail rounded mx-auto d-block" src="<?= $image->url() ?>" alt="" width="250" height="250">
          <?php endif ?>
          <?= $guide->description()->kt() ?>
          <a href="<?=$guide->url()?>" type="button" class="btn btn-primary m-2">START THE GUIDE &rarr;</a>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>