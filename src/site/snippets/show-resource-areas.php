<?php
$sizes = "(min-width: 914px) calc(700px - 20px), calc(100vw - 20px)";
?>

<?php if (count($page->children()->filterBy('template','resource-area'))>0) :
?>
<div class="container">
  <?php foreach ($page->children()->filterBy('template','resource-area') as $area) :  ?>
  <div>
    <h3 class="card-text"><?= $area->title() ?></h3>
    <?php if($image = $area->image()): ?>
    <picture>
      <source type="image/webp" srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>">
      <img alt="<?= $image->alt() ?>" src="<?= $image->resize(250)->url() ?>" srcset="<?= $image->srcset() ?>"
        sizes="<?= $sizes ?>" width="<?= $image->resize(250)->width() ?>" height="<?= $image->resize(250)->height() ?>">
    </picture>
    <?php endif ?>
    <?= $area->description()->kt() ?>
    <a href="<?=$area->url()?>" type="button" class="btn btn-primary m-2">EXPLORE &rarr;</a>
  </div>
  <?php endforeach ?>

</div>
<?php endif ?>