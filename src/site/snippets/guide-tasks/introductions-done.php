<p>Thank you for completing your intention!</p>

<?php if (count($allIntentions)>0) :?>
<p>Here is a list of all the intentions entered by other people:</p>
  <?php foreach ($allIntentions as $intention) :  ?>
<p><?=$intention->intentions()?></p>
<hr>
  <?php endforeach ?>  
<?php endif ?>
<?php snippet('guide-navigation') ?>
