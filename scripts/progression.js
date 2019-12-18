let count = 0;
$( document ).ready(function() {
    $.ajax({
            type: 'POST',
            url: 'enigme/ajaxutil',
            data: {},
            dataType: 'json',
            cache: false,
            success: function (result) {
                avancement = result[0].user_enigme;
                console.log(avancement);
                while (count < avancement)
                {
                    count++;
                    balise = ".balise-" + count;
                    fusee = "fusée" + (count+1) + ".svg";

                    console.log(balise);
                    console.log(fusee);

                    $(balise).css("background-color", "#222751");
                    for (var i = 0; i < count; i++) {
                        balise = ".balise-" + i;
                        $(balise).css("background-color", "#F9C37D");
                    }
                    $('.fusee-img').attr("src", "assets/images/fusee/" + fusee);
                }
            }
        });
});