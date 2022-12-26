<?php

// fetch all tags
$tags = $page->children()->listed()->pluck('tags', ',', true);

?>
<p>
  <strong>Tags: </strong>
  <a href="<?= url('/commons/blog') ?>">All</a> |
  <?php foreach($tags as $tag): ?>
  <a href="<?= url('/commons/blog', ['params' => ['tag' => $tag]]) ?>">
    <?= html($tag) ?>
  </a> |
  <?php endforeach ?>
</p>