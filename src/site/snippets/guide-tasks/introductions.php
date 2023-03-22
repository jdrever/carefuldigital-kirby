<form method="post">
  <label for="intentions" class="form-label">What are your intentions in using this guide?</label>
  <textarea id="intentions" name="intentions" class="form-item" rows="10"></textarea>
  <?php snippet('honeypot')?>
  <?php snippet('guide-navigation', ['taskButton'=> 'SHARE YOUR INTENTION']) ?>
</form>