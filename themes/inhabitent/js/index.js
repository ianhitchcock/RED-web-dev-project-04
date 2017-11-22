/**
 * index.js
 *
 * jQeury magic here
 *
 * Learn more: https://github.com/Automattic/_s/pull/136
 */
(function($) {

  $('.search-submit').on( 'click' , function() {
    $('.main-navigation .fieldset').toggleClass('button-toggled');
    $('.main-navigation .fieldset label input').focus();
  });
  $('.main-navigation .fieldset label input').on( 'focusout' , function() {
    if ( ! $('.search-submit').is(':hover') ) {
      $('.main-navigation .fieldset').toggleClass('button-toggled');
    }
    
  });
  $(window).scroll(function(){
    var dToTop = $(window).scrollTop(); 
    if (dToTop >= $(window).height()) {
      $('.hero-header-ph').removeClass('hero-header');
      $('.hero-header-ph .site-header .nav-logo').attr('src', function() {
        return $('.hero-header-ph .site-header .nav-logo').attr('src').toString().replace('-white', '');
      });
    }
    if (dToTop < $(window).height()) {
      $('.hero-header-ph').addClass('hero-header');
      $('.hero-header-ph .site-header .nav-logo').attr('src', function() {
        return $('.hero-header-ph .site-header .nav-logo').attr('src').toString().replace('tent.svg', 'tent-white.svg');
      });
    }
  });
})(jQuery);