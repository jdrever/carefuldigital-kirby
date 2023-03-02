<?php if ($page->hasPrev()): ?>
  <a href="<?= $page->prev()->url() ?>">← PREVIOUS: <?=$page->prev()->title()?></a>
<?php else: ?>
  <a href="<?= $page->parent()->url() ?>">← PREVIOUS: <?=$page->parent()->title()?></a>
<?php endif ?>


<?php if (isset($taskButton)) : ?>
  <button type="submit" class="btn"><?=$taskButton?> →</button>
<?php else : ?>
  <?php if ($page->hasChildren()): ?>
    <a class="btn btn-primary m-2" href="<?= $page->children()->first()->url() ?>" role="button">
          NEXT:  <?=$page->children()->first()->title()?> →
    </a>
  <?php elseif ($page->hasNext()): ?>
    <a class="btn btn-primary m-2" href="<?= $page->next()->url() ?>" role="button">
          NEXT: <?= $page->next()->title() ?>  →
    </a>
  <?php endif ?>
<?php endif ?>