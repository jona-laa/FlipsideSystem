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
        <?php get_footer_contact(); ?>
      </div>
      <span class="footer__copy">© Copyright 2021 All Rights Reserved.</span>
    </div>
  </div>
  <!-- To Top Button -->
  <a href="#header" id="goTop" class="btn-top" aria-label="Go To Top">
    <svg class="arrow up" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="5 0 50 80" xml:space="preserve">
      <polyline fill="none" stroke="#FFFFFF" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" points="
            0.375, 35.375 28.375, 0.375 58.67, 35.375 " />
    </svg>
  </a>
</footer>
<?php wp_footer(); 
  

  
// Script for Customers page carousel
if (is_page( 'Customers' )) { ?>
<script>
const carouselNav = document.querySelector(".carousel__nav");
const carouselInner = document.querySelector(".testimonials .carousel__inner");
let testimonialPages;
let windowWidth = window.innerWidth;

// Create carousel nav based on number of posts and screen width
function createCarouselNav() {
  carouselNav.innerHTML = '';
  carouselInner.style.transform = 'translateX(-00%)';

  if (window.innerWidth > 1024) {
    testimonialPages = Math.ceil(carouselInner.children.length / 3);
  }

  if (window.innerWidth <= 1024) {
    testimonialPages = Math.ceil(carouselInner.children.length / 2);
  }

  if (window.innerWidth <= 767) {
    testimonialPages = Math.ceil(carouselInner.children.length);
  }

  for (let i = 1; i <= testimonialPages; i++) {
    i == 1 ? carouselNav.innerHTML +=
      `<button class="page-${i} --current" aria-label="go to testimonials page ${i}"></button>` :
      carouselNav.innerHTML += `<button class="page-${i}" aria-label="go to testimonials page ${i}"></button>`;
  }
};

// Scroll carousel on button press
carouselNav.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(carouselNav.children).forEach(item =>
      item.classList.remove("--current")
    );

    const page = e.target.className.split('-')[1];
    carouselInner.style.transform = `translateX(-${page - 1}00%)`;
    e.target.classList.add('--current');
  }
});

window.onload = () => {
  createCarouselNav();
}

window.onresize = () => {
  window.innerWidth !== windowWidth ? createCarouselNav() : null;
};
</script>



<?php } 
// Script for Products page carousel
if (is_page( 'Products' )) { ?>
<script>
const carouselNav = document.querySelector(".carousel__nav");
const carouselInner = document.querySelector(".carousel__inner");
let windowWidth = window.innerWidth;

// Create carousel nav based on number of posts
function createCarouselNav() {
  carouselNav.innerHTML = '';
  carouselInner.style.transform = 'translateX(-00%)';


  document.querySelectorAll('.products .carousel .sup-h').forEach((elem, i) => {
    i == 0 ? carouselNav.innerHTML +=
      `<button class="page-${i} prod-nav__link prod-nav__link--current" aria-label="read about ${elem.textContent}">${elem.textContent}</button>` :
      carouselNav.innerHTML +=
      `<button class="page-${i} prod-nav__link" aria-label="read about ${elem.textContent}">${elem.textContent}</button>`;
  });
};


carouselNav.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(carouselNav.children).forEach(item =>
      item.classList.remove("prod-nav__link--current")
    );

    const page = e.target.className.split('page-')[1][0];
    carouselInner.style.transform = `translateX(-${page}00%)`;
    e.target.classList.add('prod-nav__link--current');
  }
});

window.onload = () => {
  createCarouselNav();
}

window.onresize = () => {
  window.innerWidth !== windowWidth ? createCarouselNav() : null;
};
</script>
<?php } 



if (is_page( 'FAQs' )) { ?>
<script>
window.addEventListener("DOMContentLoaded", (event) => {
  let buttons = document.querySelectorAll("#accordion button");
  buttons.forEach((button) => {
    let content = button.nextElementSibling;
    button.addEventListener("click", (event) => {
      if (button.classList.contains("active")) {
        button.classList.remove("active");
        button.setAttribute("aria-expanded", false);
        content.style.maxHeight = null;
        content.setAttribute("aria-hidden", true);
      } else {
        button.classList.add("active");
        button.setAttribute("aria-expanded", true);
        content.style.maxHeight = content.scrollHeight + "px";
        content.setAttribute("aria-hidden", false);
      }
    });
  });
});
</script>
<?php }?>
</body>

</html>