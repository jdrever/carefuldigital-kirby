<?php if ($destinationPage=$block->destination()->first()->toPage()) : ?>
  <div><a href="<?=$destinationPage->url()?>" class="btn" style="width:100%;"><?=$block->title()?></a></div>
<?php endif ?>