/* Sticky Top Nav and Sidebar on Scroll 

( function( $ ) {
  $( document ).ready(function() {

    // insure content window height
    var windowHeight = $(window).height();
    $('.page-content-wrapper').css("min-height", windowHeight - 72);

    // update on window resize
    $( window ).resize(function() {
      windowHeight = $(window).height();
      $('.page-content-wrapper').css("min-height", windowHeight - 72);
    });

    // stick/unstick on scroll
    $(window).on('scroll',function() {
      var scrolltop = $(this).scrollTop();
      var pos = $('#wrapper').position().top - 52;
      
      if(scrolltop >= pos) {
        $('#sidebar-wrapper').removeClass( "sidebar-unsticky" ).addClass( "sidebar-sticky" );
        $('#top-nav').removeClass( "nav-unsticky" ).addClass( "nav-sticky" );
      }
       
      else {
        $('#sidebar-wrapper').removeClass( "sidebar-sticky" ).addClass( "sidebar-unsticky" );
        $('#top-nav').removeClass( "nav-sticky" ).addClass( "nav-unsticky" );
      }
    });

  });
} )( jQuery ); */

( function( $ ) {
  $( document ).ready(function() {

    // Sticky Sidebar on Scroll
    var windowHeight = $(window).height();
    $('.page-content-wrapper').css("min-height", windowHeight - 20);

    // update on window resize
    $( window ).resize(function() {
      windowHeight = $(window).height();
      $('.page-content-wrapper').css("min-height", windowHeight - 20);
    });

    $(window).on('scroll',function() {
      var scrolltop = $(this).scrollTop();
      var pos = $('#wrapper').position().top;
      
      if(scrolltop >= pos) {
        $('#sidebar-wrapper').removeClass( "sidebar-unsticky" ).addClass( "sidebar-sticky" );
      }
       
      else {
        $('#sidebar-wrapper').removeClass( "sidebar-sticky" ).addClass( "sidebar-unsticky" );
      }
    });

  });
} )( jQuery );