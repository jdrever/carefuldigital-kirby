<?php snippet('header') ?>
<h1><?=$page->title()?></h1>
<?php if (!$taskComplete) : ?>
<?php snippet('show-blocks') ?>
<?php snippet('guide-tasks/introductions') ?>
<?php else : ?>
<?php snippet('guide-tasks/introductions-done') ?>  
<?php endif ?>
<?php snippet('guide-tasks/show-introductions') ?>
<?php snippet('footer') ?>
