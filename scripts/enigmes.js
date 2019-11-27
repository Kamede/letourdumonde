$message = "";
var $timeout = 15; 

$(document).ready( function() 
{
    $.ajax(
        {
        type: 'POST',
        //url: 'controller.php',
        url: 'enigme/ajax',
        data: {id:1},
        dataType: 'json',
        cache: false,
        success: function(result) 
        {

            // changing puzzle number
            $('#viewer-puzzle').html("Enigme N°" + result[0].enigme_id);

            // changing puzzle background
            $("#viewer").css("background-image", "url(assets/images/fonds/" + result[0].enigme_fond + ")");

            // changing character
            $("#character-scnd").attr("src", "assets/images/viewer/characters/" + result[0].enigme_perso);

            let dialogue = result[0].enigme_dialogue;
            let indices = result[0].enigme_indice;

            // remove non-printable and other non-valid JSON chars
            dialogue = dialogue.replace(/[\u0000-\u0019]+/g,""); 
            dialogue = JSON.parse(dialogue);

            indices = indices.replace(/[\u0000-\u0019]+/g,""); 
            indices = JSON.parse(indices);

            for (var i = 0; i < indices.length; i++) {
                $("#viewer-tips").html("<img src='assets/images/viewer/tips/" + indices[i].image + "'>");
            }

            // Onclick
            index = -1

            $("#viewer").click(function()
            {
                console.log(index);
                if(index < dialogue.length-1)
                {
                    // Counter
                    index++;

                    // Cleaning old message
                    $('#viewer-textbox').html("");
                    
                    // Setting heads thumbnail
                    $('#viewer-textbox').append("<img src='assets/images/viewer/characters_head/" + dialogue[index].nom + ".svg'>")

                    // Setting delay
                    $timeout = 50;

                    // Splitting message
                    $message = dialogue[index].message.split('').reverse();

                    // Animating the text
                    var output = setInterval(function() 
                    {
                        $('#viewer-textbox').append($message.pop());
                        if ($message.length === 0) 
                        {            
                            clearInterval(output);   
                        }
                    }, $timeout);

                    // Handling name
                    $('#viewer-textbox-name').html(dialogue[index].nom); 
                }   
                else
                {
                    // Debugging only
                    console.log("No messages found")
                }
            });
        },
    });

    // Managing answer
    $(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            let response = $('input[name="1"]').val() + $('input[name="2"]').val() + $('input[name="3"]').val() + $('input[name="4"]').val();
            console.log(response);
            $.ajax(
            {
                type: 'POST',
                url: 'enigme/validation',
                data: {response_data: response, id: 1},
                dataType: 'json',
                cache: false,
                success: function(result) 
                {

                    // Checking if success
                    if(result == true)
                    {
                        $('#popup').fadeIn();
                        $('#popup-text').html("Bravo!");
                        $('#popup-button').html("Continuer");
                        $('input[type="text"]').css({"color": "green"});
                        $('#popup-button').css({"background-color": "rgb(40, 241, 33)"})
                        $('.dim').css('visibility', 'visible'),
                        $('.dim').animate({opacity: '0.3'}, 500); 
                    }
                    else
                    {
                        $('input[type="text"]').css({"color": "red"});
                        $('#popup').fadeIn();
                        $('#popup-text').html("Raté !");
                        $('#popup-button').html("Réessayer");
                        $('#popup-button').css({"background-color": "red"})
                        $('.dim').css('visibility', 'visible'),
                        $('.dim').animate({opacity: '0.3'}, 500); 
                    }
                }
            }); 
        });
    });

    $('#popup-button').click(function() {
        $('#popup').fadeOut();
        $('.dim').animate({opacity: '0'}, 500, function(){$('.dim').css('visibility', 'hidden')})
        $('input[name="1"]').val("");
        $('input[name="2"]').val("");
        $('input[name="3"]').val("");
        $('input[name="4"]').val("");
    });

    // Display Fullscreen
    function toggleFullScreen(elem)
    {
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }

    $("#viewer-fullscreen").click(function() {
        toggleFullScreen(document.body);
    });
});