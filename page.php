<?php get_header(); 
if (!is_page( 'Home' )) { ?>
<h1><?php the_title() ?></h1>
<?php 
}
the_content(); ?>
<?php get_footer(); 

// Add scripts to customers and products pages
if (is_page( 'Customers' )) { ?>
<script>
const carouselNav = document.querySelector(".carousel__nav");
const carouselInner = document.querySelector(".carousel__inner");
let testimonialPages;

// Create carousel nav based on number of posts and screen size
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
    i == 1 ? carouselNav.innerHTML += `<button class="page-${i} --current" aria-label="go to page ${i}"></button>` :
      carouselNav.innerHTML += `<button class="page-${i}" aria-label="go to page ${i}"></button>`;
  }
};


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
  createCarouselNav();
};
</script>
<?php } 



if (is_page( 'Products' )) { ?>
<script defer>
const carouselNav = document.querySelector(".carousel__nav");
const carouselInner = document.querySelector(".carousel__inner");
// const testimonialPages = Math.ceil(carouselInner.children.length);

// Create carousel nav based on number of posts
function createCarouselNav() {
  carouselNav.innerHTML = '';
  carouselInner.style.transform = 'translateX(-00%)';


  document.querySelectorAll('.carousel .sup-h').forEach((elem, i) => {
    i == 0 ? carouselNav.innerHTML +=
      `<button class="page-${i} prod-nav__link prod-nav__link--current" aria-label="go to page ${i}">${elem.textContent}</button>` :
      carouselNav.innerHTML +=
      `<button class="page-${i} prod-nav__link" aria-label="go to page ${i}">${elem.textContent}</button>`;
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
  createCarouselNav();
};
</script>
<?php } ?>