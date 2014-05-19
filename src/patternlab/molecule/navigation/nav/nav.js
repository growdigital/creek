$(document).ready(function() {

  $('body').addClass('js');

  var
    $menulink = $('.Header-menu'),
    $morelink = $('.Nav-too'),
    $wrap = $('.Nav-wrap');

  $menulink.click(function() {
    $menulink.toggleClass('active');
    $wrap.toggleClass('active');
    return false;
  });

  // Link to bottom nav, hides main menu
  $morelink.click(function() {
    $wrap.removeClass('active');
  });

});
