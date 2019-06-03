$(document).ready( function() {
  var navbarHeight = $('.navbar').height(),
      speed = 600;

  $('.smoothScroll').smoothScroll({
    offset: -navbarHeight,
    speed: speed
  });

  $('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
  });

});