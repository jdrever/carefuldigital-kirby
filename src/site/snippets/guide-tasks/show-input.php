
<?php if (count($allInput)>0) :?>
<p>This is what other people doing this guide have come up with:</p>
  <?php foreach ($allInput as $input) :  ?>
<article><?=$input->intentions()?></article>
<hr>
  <?php endforeach ?>  
<?php endif ?>