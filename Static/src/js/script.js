const nav = document.querySelector('.nav');
const mainMenu = document.querySelector('.nav__menu');
const mainMenuToggle = document.querySelector('#nav__menu-toggle');



// Toggle mobile menu
$(mainMenuToggle).click(function () {
  if (mainMenu.getAttribute('aria-hidden') == 'false') {
    mainMenu.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
  } else {
    mainMenu.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
  }
  $(mainMenu).toggle(200);

  // $(mainMenu).slideToggle(200, function () {
  // });
});



// Correct WAI-ARIA on resize
window.onresize = () => {
  if (window.innerWidth <= 950) {
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



// Toggle mobile menu
$('#main-menu-toggle').click(function () {
  if (mainMenu.getAttribute('aria-hidden') == 'false') {
    mainMenu.setAttribute('aria-hidden', 'true');
    mainMenuToggle.setAttribute('aria-expanded', 'false');
  } else {
    mainMenu.setAttribute('aria-hidden', 'false');
    mainMenuToggle.setAttribute('aria-expanded', 'true');
  }

  $('.main-menu ul').slideToggle(200, function () {
  });
});



//Smooth scrolling
$('.arrow-link').on('click', function (e) {
  if (this.hash !== '') {
    e.preventDefault();

    const hash = this.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top,
    },
      800
    );
  }
});
