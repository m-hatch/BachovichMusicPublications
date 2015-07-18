
( function( $ ) {
  $( document ).ready(function() {

    // Sidebar Menu Toggle
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Sticky Sidebar on Scroll
    var windowHeight = $(window).height();
    $('.page-content-wrapper').css("min-height", windowHeight - 20);

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

    // Sidebar Submenu Script
    $('#sidebar-wrapper li.has-sub>a').on('click', function(){
      console.log('clicked');
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
          element.removeClass('open');
          element.find('li').removeClass('open');
          element.find('ul').slideUp();
        }
        else {
          element.addClass('open');
          element.children('ul').slideDown();
          element.siblings('li').children('ul').slideUp();
          element.siblings('li').removeClass('open');
          element.siblings('li').find('li').removeClass('open');
          element.siblings('li').find('ul').slideUp();
        }
    });

    // menu dropdown caret
    $('#sidebar-wrapper li.has-sub>a').append('<span class="holder"></span>');

  });
} )( jQuery );
