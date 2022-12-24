<?php snippet('header') ?>
<script type="text/javascript">
  function validateForm() {
    var msg = "";
    var email = document.forms["ContactForm"]["Email"].value;
    var message = document.forms["ContactForm"]["Message"].value;
    if (email == null || email == "") {
      msg += "You must enter your email address\n";
      document.forms["ContactForm"]["Email"].focus();
    }
    if (message == null || message == "") {
      msg += "You must enter your message\n";
      document.forms["ContactForm"]["Message"].focus();
    }
    if (msg != "") {
      alert(msg);
      return false;
    }
    return true;
  }
</script>
<h1>
  Contacting Careful Digital
</h1>
<p>
  For any information regarding the services we provide please feel free to
  contact us and we will be happy to help
</p>
<form action='/thanks/index' id='ContactForm' method='post' onsubmit='return validateForm();'><input type='hidden'
    name='form-name' value='ContactForm' />
  <fieldset>
    <legend>Please enter your details</legend>
    <div class="mb-3">
      <label for="Message" class="form-label">Your Message</label><br />
      <textarea name="Message" id="Message" rows="3" width="40" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label for="Email">Your Email Address</label><br />
      <input type="email" name="Email" id="Email" class="form-control" width="40" />
    </div>
    <input type="submit" value="SEND" name="Send" id="Send" class="btn btn-primary" />
  </fieldset>
</form>

<?php snippet('footer') ?>