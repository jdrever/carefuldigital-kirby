<?php snippet('header') ?>
<h1><?=$page->title()?></h1>
<p><strong><?=$page->publishedDate()?></strong></p>
<div class="lead"><?=$page->openingContent()->kt()?></div>
<?php snippet('show-blocks')?>
<?php snippet('footer') ?>
