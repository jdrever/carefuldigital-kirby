<form method="post">
<?php if ($page->labelText()->isNotEmpty()) : ?> 
  <label for="intentions" class="form-label"><?=$page->labelText()?></label>
<?php endif ?>
  <textarea id="intentions" name="intentions" class="form-item" rows="10"></textarea>
  <?php snippet('honeypot')?>
  <?php snippet('guide-navigation', ['taskButton'=> $page->buttonText()->isNotEmpty() ? $page->buttonText() : $page->title()]) ?>
</form>