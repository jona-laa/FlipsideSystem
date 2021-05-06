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