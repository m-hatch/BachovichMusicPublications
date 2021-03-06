
( function( $ ) {
  $( document ).ready(function() {

    var windowWidth = $(window).width();
    // Set page height and update on window resize
    var windowHeight = $(window).height() + 60;
    $('#page-body').css("min-height", windowHeight);
    $('#sidebar-wrapper').css("height", windowHeight - 52);

    $( window ).resize(function() {
      windowWidth = $(window).width();
      windowHeight = $(window).height();
      $('#page-body').css("min-height", windowHeight);
      $('#sidebar-wrapper').css("height", windowHeight - 52);
    });

    // Sidebar Menu Toggle
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        /*if($(this).text() == "Open Menu"){
          $(this).text("Close Menu");
        } else {
          $(this).text("Open Menu");
        }*/
        $("#menus").toggleClass("toggled");
        $(".wrapper").toggleClass("toggled");
    });

    // Close Sidebar on Menu Selection
    $(".sidebar-toggle").click(function(e) {
        if(windowWidth < 768){
          $("#menus").toggleClass("toggled");
          $(".wrapper").toggleClass("toggled");
        } 
    });

    // Sidebar Submenu Script
    $('#sidebar-wrapper li.has-sub>a').on('click', function(){
      
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
