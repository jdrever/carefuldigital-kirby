<?php
$sizes = "(min-width: 914px) calc(700px - 20px), calc(100vw - 20px)";
?>

<?php if (count($page->children()->filterBy('template','resource-area'))>0) :
?>
<div class="card-group">
  <?php foreach ($page->children()->filterBy('template','resource-area') as $area) :  ?>
  <div class="card-container">
    <div class="card-content">
      <h3><?= $area->title() ?></h3>
    <?php if($image = $area->image()): ?>
      <picture>
        <source type="image/webp" srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>">
        <img alt="<?= $image->alt() ?>" src="<?= $image->resize(250)->url() ?>" srcset="<?= $image->srcset() ?>"
        sizes="<?= $sizes ?>" width="<?= $image->resize(250)->width() ?>" height="<?= $image->resize(250)->height() ?>">
      </picture>
    <?php endif ?>
      <?= $area->description()->kt() ?>
    </div>
    <a href="<?=$area->url()?>" class="card-button">Explore &rarr;</a>
    
  </div> 
  <?php endforeach ?>

</div>
<?php endif ?>