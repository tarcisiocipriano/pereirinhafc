$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('navbar--dark-blue');
  } else {
    $('nav').removeClass('navbar--dark-blue');
  }
});