
<nav class="breadcrumb" aria-label="breadcrumb">
    <ol role="list">
    <?php foreach($site->breadcrumb() as $crumb): ?>
    <li>
      <a href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>><?= html($crumb->title()) ?></a>
    </li>
    <?php endforeach ?>
  </ol>
</nav>
</div>

