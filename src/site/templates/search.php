<?php snippet('header') ?>

<form>
  <input type="search" aria-label="Search" name="q" value="<?= html($query) ?>">
  <input type="submit" value="Search">
</form>

<ul>
  <?php foreach ($results as $result): ?>
  <li>
    <a href="<?= $result->url() ?>">
      <?= $result->title() ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('footer') ?>