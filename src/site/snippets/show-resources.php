<?php if (count($page->children()->filterBy('template','resource'))>0) :
?>
<div class="container">
  <?php foreach ($page->children()->filterBy('template','resource') as $resource) :  ?>
  <div>
    <a href="<?=$resource->url()?>" type="button" class="btn btn-primary m-2"><?=$resource->title() ?></a>
  </div>
  <?php endforeach ?>
</div>
<?php endif ?>