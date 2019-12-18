$( document ).ready(function() {
    let count = 0;
    $('button').click(function()
    {
        if (count < 10)
        {
            count++;
            balise = ".balise-" + count;
            fusee = "fusée" + (count+1);

            console.log(balise);
            console.log(fusee);

            $(balise).css("background-color", "#222751");
            for (var i = 0; i < count; i++) {
                balise = ".balise-" + i;
                $(balise).css("background-color", "#F9C37D");
            }
            $('.fusee-img').attr("src", "assets/images/fusee/" + fusee);
        }   
        else
        {
            console.log("Out of range")
        }
    })
});