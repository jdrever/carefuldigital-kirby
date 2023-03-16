<?php 
$collection = $kirby->collection("guides-content");

if ($page->prev($collection))
{
  $previousPage=$page->prev($collection);
}

if(!isset($taskButton))
{
  if ($page->mainContent()->toBlocks()->hasType('route')===false)
  {
    if ($next = $page->next($collection)) 
    {
      $nextPage=$page->next($collection);
    }
  }
}
?>

<?php if (isset($previousPage)||isset($nextPage)||isset($taskButton)) : ?>
  <div class="container" style="align-items:center;">
    <div>
  <?php if (isset($previousPage)) : ?>
<a href="<?= $previousPage->url() ?>">&larr; <?=t('PREVIOUS','PREVIOUS')?>: <?=$previousPage->title()?></a>
  <?php endif ?>
    </div>
    <div>
  <?php if (isset($nextPage)&&!in_array($nextPage->template(), array('country','team-page'))) : ?>
<a class="btn" href="<?= $nextPage->url() ?>"><?=t('NEXT','NEXT')?>: <?=$nextPage->title()?> &rarr;</a>
  <?php endif ?>
  <?php if (isset($taskButton)) : ?>
    <button type="submit" class="btn"><?=$taskButton?> &rarr;</button>
  <?php endif ?>
  </div>
<?php endif ?>
</div>
</div>

