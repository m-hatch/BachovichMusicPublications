/* Sticky Top Nav and Sidebar on Scroll */

( function( $ ) {
  $( document ).ready(function() {
      var scrolltop = $(this).scrollTop();
      var pos = $('#page-body').position().top;

    // update on scroll
    $(window).on('scroll',function() {
      scrolltop = $(this).scrollTop();
      pos = $('#page-body').position().top;
      sticky();
    });

    // update on window resize
    $( window ).resize(function() {
      scrolltop = $(this).scrollTop();
      pos = $('#page-body').position().top;
      sticky();
    });

    function sticky() {
      if(scrolltop >= pos) {
        $('#top-nav').removeClass( "unsticky" ).addClass( "sticky" );
        $('#sidebar-wrapper').removeClass( "unsticky" ).addClass( "sticky" );
      }
       
      else {
        $('#top-nav').removeClass( "sticky" ).addClass( "unsticky" );
        $('#sidebar-wrapper').removeClass( "sticky" ).addClass( "unsticky" );
      }
    }

  });
} )( jQuery );