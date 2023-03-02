<?php if (count($allIntentions)>0) :?>
<p>Here is a list of all the intentions entered by other people:</p>
  <?php foreach ($allIntentions as $intention) :  ?>
<article><?=$intention->intentions()?></article>
<hr>
  <?php endforeach ?>  
<?php endif ?>