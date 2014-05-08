$(document).ready(function() {
  $('body').addClass('js');

  var $menu = $('#Nav'),
    $menulink = $('.Header-menu'),
    $wrap = $('.Nav-wrap');

  $menulink.click(function() {
    $menulink.toggleClass('active');
    $wrap.toggleClass('active');
    return false;
  });
});
