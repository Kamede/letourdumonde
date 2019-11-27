var current = $(window).scrollTop();

// Popup event

$('nav ul li').click(function() {
    $(window).scroll(function() {
      $(window).scrollTop(current);
    });

    // Get Data

    window.popup = $(this).attr("data-popup");

    // Change html content

    $.getJSON('scripts/popup.json', function(data) {
      items = data.form;
      $(".popup").html(items[popup]);
    })
    .done(function() {
      console.log( "second success" );
    })
    .fail(function( jqxhr, textStatus, error ) {
      var err = textStatus + ", " + error;
      console.log( "Request Failed: " + err );
    })
    .always(function() {
      console.log( "complete" );
    });

    // Popup event start

    $('.popup').css('display', 'block'),
    $('.popup').animate({opacity: '1'}, 500),
    $('.dim').css('visibility', 'visible'),
    $('.dim').animate({opacity: '0.3'}, 500); 
});

// Popup event cancel

$( ".dim" ).click(function() {
  $(window).off('scroll');
  $('.popup').animate({opacity: '0'}, 500, function(){$('.popup').css('display', 'none')}),
  $('.dim').animate({opacity: '0'}, 500, function(){$('.dim').css('visibility', 'hidden')})
});