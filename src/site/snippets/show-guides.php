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
  <div class="container">
          <?php foreach ($page->children()->filterBy('template',$templateName) as $guide) :  ?>
            <div>
          <h3><?= $guide->title() ?></h3>
          <?php if($image = $guide->image()): ?>
          <img src="<?= $image->url() ?>" alt="" width="250" height="250">
          <?php endif ?>
          <?= $guide->description()->kt() ?>
          <a href="<?=$guide->url()?>" type="button" class="btn">START THE GUIDE &rarr;</a>
          </div>
        <?php endforeach ?>

</div>
<?php endif ?>