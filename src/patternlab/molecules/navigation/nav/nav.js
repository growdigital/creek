$(document).ready(function() {
  $('body').addClass('js');

  var $menu = $('#menu'),
    $menulink = $('.Header-menu'),
    $wrap = $('#wrap');

  $menulink.click(function() {
    $menulink.toggleClass('active');
    $wrap.toggleClass('active');
    return false;
  });
});
