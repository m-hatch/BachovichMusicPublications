/* Sticky Top Nav on Scroll */

( function( $ ) {
  $( document ).ready(function() {
      var scrolltop = $(this).scrollTop();
      var pos = $('#dash-body').position().top;

    // update on scroll
    $(window).on('scroll',function() {
      scrolltop = $(this).scrollTop();
      pos = $('#dash-body').position().top;
      sticky();
    });

    // update on window resize
    $( window ).resize(function() {
      scrolltop = $(this).scrollTop();
      pos = $('#dash-body').position().top;
      sticky();
    });

    function sticky() {
      if(scrolltop >= pos) {
        $('#dash-nav').removeClass( "unstick" ).addClass( "sticky" );
      }
       
      else {
        $('#dash-nav').removeClass( "sticky" ).addClass( "unstick" );
      }
    }

  });
} )( jQuery );