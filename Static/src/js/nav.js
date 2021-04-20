// Toggle mobile menu
const mainMenuToggle = document.querySelector('#nav__menu-toggle');
$(mainMenuToggle).click(function () {
  if (mainMenu.getAttribute('aria-hidden') == 'false') {
    mainMenu.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
  } else {
    mainMenu.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
  }
  $(mainMenu).toggle(200);
});



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
