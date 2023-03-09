
  <hr>
  <?php snippet('show-newsletter-link') ?>
  <hr>
  </article>
</main>


<footer>
  <div class="main">
    <p><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons Licence"
          style="border-width:0" width="88" height="31"
          src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png"></a><br>The contents of
      this Digital Commons are licensed under a <a rel="license"
        href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0
        International License</a>.</p>
    <p>
      This Digital Commons is being created by <a href="https://careful.digital">Careful Digital</a>. If you would like
      to find out more about our services, please
      <a href="https://careful.digital/contact/">Contact Us</a>
    </p>
    <div class="main">
</footer>

<script>
    let menuToggle = document.querySelector('#menu-toggle');
    let mainMenu=document.querySelector('nav.main');
    menuToggle.addEventListener('click', function(event)
    {
      let menuDisplay =
        window.getComputedStyle(mainMenu).getPropertyValue('display')
      console.log(menuDisplay);
      if (menuDisplay === "none") 
      {
        mainMenu.style.display = "block";
      } 
      else 
      {
        mainMenu.style.display = "none";
      }
    });
  </script>
</body>

</html>