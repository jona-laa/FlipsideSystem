// Toggle mobile menu
const mainMenuToggle = document.querySelector('#nav__menu-toggle');
const mainMenu = document.querySelector('.menu');
const nav = document.querySelector('.nav');



// Give last menu link button appearance
mainMenu.lastElementChild.firstElementChild.classList += 'btn';



// Toggle mobile menu
mainMenuToggle.addEventListener('click', () => {

  // Toggle display and animation
  if (mainMenu.style.display !== 'block') {
    mainMenu.style.display = 'block';
    mainMenu.style.animation = 'slidedown 0.5s ease-out';
  } else {
    mainMenu.style.animation = 'slideup 0.5s ease-out';
    mainMenu.addEventListener('animationend', animationEndCallback);
  }

  // Toggle wai-aria
  if (mainMenu.getAttribute('aria-hidden') == 'false') {
    mainMenu.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
  } else {
    mainMenu.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
  }

})
// Animation callback - display none on menu after slide up
const animationEndCallback = () => {
  mainMenu.removeEventListener('animationend', animationEndCallback);
  mainMenu.style.display = 'none';
}



// Hide Header on scroll
let prevScrollpos = window.pageYOffset;

const hideMenu = () => {
  let currentScrollPos = window.pageYOffset;

  if (window.pageYOffset > 100) {
    if (prevScrollpos > currentScrollPos) {
      // Header
      elementToggle(nav, 'top', '0');
      nav.setAttribute('aria-hidden', 'false');

      // Menu
      elementDisplay(mainMenu, 'none');

      if (window.innerWidth <= 850) {
        // Toggle
        mainMenuToggle.setAttribute('aria-hidden', 'false');
      }
    } else {
      elementToggle(nav, 'top', '-180px');
      nav.setAttribute('aria-hidden', 'true');
      elementDisplay(mainMenu, 'none');
      mainMenuToggle.setAttribute('aria-hidden', 'true');
      mainMenu.setAttribute('aria-hidden', 'true');

    }
  }

  prevScrollpos = currentScrollPos;
}



// Correct WAI-ARIA on resize
window.onresize = () => {
  if (window.innerWidth <= 850) {
    mainMenu.style.display = 'none';
    mainMenu.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
  } else {
    mainMenu.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
  }
}



// Set WAI-ARIA on page load
window.onload = () => {
  if (window.innerWidth <= 850) {
    mainMenuToggle.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
    mainMenu.setAttribute('aria-hidden', 'true');
  } else {
    mainMenuToggle.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
    mainMenu.setAttribute('aria-hidden', 'false');
  }
}
