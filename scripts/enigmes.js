$message = "";
var $timeout = 15; 


$(document).ready( function() 
{
    function getenigme() {
        $.ajax(
            {
            type: 'POST',
            //url: 'controller.php',
            url: 'enigme/ajax' ,
            data: {},
            dataType: 'json',
            cache: false,
            success: function(result) 
            {

                // changing puzzle number
                $('#viewer-puzzle').html("Enigme N°" + result[0].enigme_id);

                $("#reponse-input").empty();
                for (i=0; i < result[0].enigme_reponse_taille; i++)
                {
                    name = i + 1;
                    $("#reponse-input").append('<input name="'+ name +'" class="inputs" type="text" maxlength="1">');
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

                $("#viewer-tips").html("<img src='assets/images/viewer/tips/" + indices + "'>");

                // Onclick
                index = -1

                $("#viewer").click(function()
                {
                    if(index < dialogue.length-1)
                    {
                        // Counter
                        index++;
                        var random =  Math.floor(Math.random() * 12);
                        random = +random + 1;
                        $("#player").attr("src", "assets/audio/" + random + ".mp3" );
                        $("#player")[0].play();


                        // Cleaning old message
                        $('#viewer-textbox').html("");
                        
                        // Setting heads thumbnail
                        $('#viewer-textbox').append("<img src='assets/images/viewer/characters_head/" + dialogue[index].nom + ".svg'>")

                        // Setting delay
                        $timeout = 50;

                        // Splitting message
                        message = dialogue[index].message.split('').reverse();

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
                    }
                });
            },
        });
    }

    getenigme();
    // Managing answer
    $(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            var response = "";
            $('#reponse-input input').each(function () {
                response = response + this.value;
            });
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
                        $(document).click(function() {
                            window.location.href = "http://89.234.183.207/letourdumonde/";
                        })
                    }else if ( result== 'end') {
                        $('input[type="text"]').css({"color": "green"});
                        $('#popup').fadeIn();
                        $('#popup-text').html("Bravo ! Vous avez terminé le jeu !");
                        $('#popup-button').html("Quitter");
                        $('#popup-button').css({"background-color": "green"})
                        $('.dim').css('visibility', 'visible'),
                            $('.dim').animate({opacity: '0.3'}, 500);
                        $(document).click(function () {
                            window.location.href = "http://89.234.183.207/letourdumonde/bravo";
                        })
                    }
                }
            }); 
        });
    });

    $('#popup-button ').click(function() {
        $('#popup').fadeOut();
        $('.dim').animate({opacity: '0'}, 500, function(){$('.dim').css('visibility', 'hidden')});
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
            $('#viewer-textbox').empty();
            getenigme();
        }

    });
});