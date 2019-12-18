$message = "";
var $timeout = 15; 


$(document).ready( function() 
{
    function getenigme() {
        $.ajax(
            {
            type: 'POST',
            //url: 'controller.php',
            url: 'enigme/ajax',
            data: {},
            dataType: 'json',
            cache: false,
            success: function(result) 
            {

                console.log(result);
                // changing puzzle number
                $('#viewer-puzzle').html("Enigme N°" + result[0].enigme_id);

                $("#reponse-input").empty();
                for (i=0; i < result[0].enigme_reponse_taille; i++)
                {
                    name = i + 1;
                    $("#reponse-input").append('<input name="'+ name +'" class="inputs" type="text" pattern="[0-9]" maxlength="1">');
                }

                // changing puzzle background
                $("#viewer").css("background-image", "url(assets/images/viewer/fonds/" + result[0].enigme_fond + ")");

                // changing character
                $("#character-scnd").attr("src", "assets/images/viewer/characters/" + result[0].enigme_perso);

                dialogue = result[0].enigme_dialogue;
                indices = result[0].enigme_indice;

                // remove non-printable and other non-valid JSON chars
                dialogue = dialogue.replace(/[\u0000-\u0019]+/g,""); 
                dialogue = JSON.parse(dialogue);

                console.log(dialogue);

                $("#viewer-tips").html("<img src='assets/images/viewer/tips/" + indices + "'>");
                console.log("<img src='assets/images/viewer/tips/" + indices + "'>");

                // Onclick
                index = -1

                $("#viewer").click(function()
                {
                    console.log(index);
                    console.log(dialogue.length-1)
                    if(index < dialogue.length-1)
                    {
                        // Counter
                        index++;
                        $("#player").attr("src", "assets/audio/" + Math.floor(Math.random() * 12) + 1 + ".mp3" );
                        $("#player")[0].play();


                        // Cleaning old message
                        $('#viewer-textbox').html("");
                        
                        // Setting heads thumbnail
                        $('#viewer-textbox').append("<img src='assets/images/viewer/characters_head/" + dialogue[index].nom + ".svg'>")

                        // Setting delay
                        $timeout = 50;

                        // Splitting message
                        message = dialogue[index].message.split('').reverse();
                        
                        console.log(message);

                        // Animating the text
                        var output = setInterval(function() 
                        {
                            $('#viewer-textbox').append(message.pop());
                            if (message.length === 0) 
                            {            
                                clearInterval(output);   
                            }
                        }, $timeout);

                        // Handling name
                        $('#viewer-textbox-name').html(dialogue[index].nom); 
                    }   
                    else
                    {
                        console.log("No messages found")
                    }
                });
            },
        });
    }

    getenigme(id_counter);
    // Managing answer
    $(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            let response = $('input[name="1"]').val() + $('input[name="2"]').val() + $('input[name="3"]').val() + $('input[name="4"]').val();
            console.log(response);
            $.ajax(
            {
                type: 'POST',
                url: 'Enigme/validation',
                data: {response_data: response},
                dataType: 'json',
                cache: false,
                success: function(result) 
                {
                    validate = result;
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
                    else if (result == false)
                    {
                        $('input[type="text"]').css({"color": "red"});
                        $('#popup').fadeIn();
                        $('#popup-text').html("Raté !");
                        $('#popup-button').html("Réessayer");
                        $('#popup-button').css({"background-color": "red"})
                        $('.dim').css('visibility', 'visible'),
                        $('.dim').animate({opacity: '0.3'}, 500); 
                    }
                    else if (result == 'block')
                    {
                        $('input[type="text"]').css({"color": "red"});
                        $('#popup').fadeIn();
                        $('#popup-text').html("Raté ! Vous avez utilisé vos trois essais");
                        $('#popup-button').html("Quitter");
                        $('#popup-button').css({"background-color": "red"})
                        $('.dim').css('visibility', 'visible'),
                            $('.dim').animate({opacity: '0.3'}, 500);
                    }
                }
            }); 
        });
    });

    $('#popup-button ').click(function() {
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

    $("#popup-button").click(function() {
        if (validate === true)
        { 
            getenigme();
        }

    });
});