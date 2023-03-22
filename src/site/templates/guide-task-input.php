<?php snippet('header') ?>
<h1><?=$page->title()?></h1>
<?php if (!$taskComplete) : ?>
<?php snippet('show-blocks') ?>
<?php snippet('guide-tasks/input') ?>
<?php else : ?>
<?php snippet('guide-tasks/input-done') ?>  
<?php endif ?>
<?php snippet('guide-tasks/show-input') ?>
<?php snippet('footer') ?>
