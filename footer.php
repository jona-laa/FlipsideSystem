  </main>

  <footer class="footer">
    <div class="footer__content">
      <?php get_footer_about(); ?>

      <div class="footer__links">
        <h3 class="footer__heading">Quick Links</h3>
        <?php wp_nav_menu(array( 'theme_location' => 'footer-menu'));?>
      </div>

      <div class="footer__contact">
        <div>
          <h3 class="footer__heading">Contact Us</h3>
          <ul>
            <li>0046-8897-989</li>
            <li>email: info@flipsidesystems.com</li>
          </ul>
        </div>
        <span class="footer__copy">© Copyright 2021 All Rights Reserved.</span>
      </div>
    </div>
    <!-- To Top Button -->
    <a href="#" id="goTop" class="btn-top" aria-label="Go To Top">
      <svg class="arrow up" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="5 0 50 80" xml:space="preserve">
        <polyline fill="none" stroke="#FFFFFF" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" points="
    		        0.375, 35.375 28.375, 0.375 58.67, 35.375 " />
      </svg>
    </a>
  </footer>
  <script src="//code.jquery.com/jquery-latest.js"></script>
  <?php wp_footer(); ?>
  </body>

  </html>