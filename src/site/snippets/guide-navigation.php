<?php 
$collection = $kirby->collection("guides-content");

if ($page->prev($collection))
{
  $previousPage=$page->prev($collection);
}

if(!isset($taskButton))
{
  if ($next = $page->next($collection)) 
  {
    $nextPage=$page->next($collection);
  }
}
?>

<?php if (isset($previousPage)||isset($nextPage)||isset($taskButton)) : ?>
  <div class="container" style="align-items:center;">
    <div>
  <?php if (isset($previousPage)) : ?>
<a href="<?= $previousPage->url() ?>"><i class="bi bi-arrow-left"></i> <?=t('PREVIOUS','PREVIOUS')?>: <?=$previousPage->title()?></a>
  <?php endif ?>
  <?php if (isset($nextPage)&&!in_array($nextPage->template(), array('country','team-page'))) : ?>
<a class="btn" href="<?= $nextPage->url() ?>"><?=t('NEXT','NEXT')?>: <?=$nextPage->title()?> <i class="bi bi-arrow-right"></i></a>
  <?php endif ?>
  <?php if (isset($taskButton)) : ?>
    <button type="submit" class="btn"><?=$taskButton?> <i class="bi bi-arrow-right"></i></button>
  <?php endif ?>
  </div>
<?php endif ?>
</div>
</div>

