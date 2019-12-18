<html>
<head>
    <title>Le Tour Du Monde En 10 Enigmes - Panneau de gestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.css.map">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <ul>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/">Accueil gestion</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/user">Utilisateurs</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/enigme">Enigmes</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/cle">Clé d'activation</a></li>
        <li><a class="nav-link" href="<?php  echo base_url(); ?>Login/Logout">Deconnexion</a></li>
    </ul>
<br><br>
<h1>Gestion des données</h1>
<hr>
    <p>Utilisation : Utilisateurs</p>
    <ul>
        <li>Blocage : Pour un blocage sans limite de temps, entrez "X" dans le champ "user heure blocage".</li>
        <li>Pour débloquer l'utilisateur, indiquez "0" dans ce même champs.</li>
        <li>Pour un blocage temporaire, entrez la date de déblocage indiquée par ce convertisseur :</li>

    </ul>
    <br>
    <div><input type="text" id="jours" placeholder="Jours"/>
        <input type="text" id="heures" placeholder="Heures"/>
        <input type="text" id="minutes" placeholder="Minutes"/>
        <input type="text" id="secondes" placeholder="Secondes"/></div>
    <div id="test">
        <p>Ici le résultat convetisseur jours/heures/minutes/secondes en secondes</p>
    </div>
</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(
        function () {

            //$("#test").load("<?php base_url(); ?>Gestion/convertir/0/0/0/0");


            $("#jours").keyup(
                function () {
                    if ($("#jours").val() == ' ') $("#jours").val('0');

                    if ($("#jours").val() != '') {
                        b1=$("#jours").val()
                    }else{
                        b1=0
                    }

                    if ($("#heures").val() != '') {
                        b2=$("#heures").val()
                    }else{
                        b2=0
                    }

                    if ($("#minutes").val() != '') {
                        b3=$("#minutes").val()
                    }else{
                        b3=0
                    }

                    if ($("#secondes").val() != '') {
                        b4=$("#secondes").val()
                    }else{
                        b4=0
                    }

                    $("#test").load("<?php base_url(); ?>gestion/convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)

                });

            $("#heures").keyup(
                function () {
                    if ($("#heures").val() == ' ') $("#heures").val('0');

                    if ($("#jours").val() != '') {
                        b1=$("#jours").val()
                    }else{
                        b1=0
                    }

                    if ($("#heures").val() != '') {
                        b2=$("#heures").val()
                    }else{
                        b2=0
                    }

                    if ($("#minutes").val() != '') {
                        b3=$("#minutes").val()
                    }else{
                        b3=0
                    }

                    if ($("#secondes").val() != '') {
                        b4=$("#secondes").val()
                    }else{
                        b4=0
                    }

                    $("#test").load("<?php base_url(); ?>gestion/convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
                }

            );
            $("#minutes").keyup(
                function () {
                    if ($("#minutes").val() == ' ') $("#minutes").val('0');

                    if ($("#jours").val() != '') {
                        b1=$("#jours").val()
                    }else{
                        b1=0
                    }

                    if ($("#heures").val() != '') {
                        b2=$("#heures").val()
                    }else{
                        b2=0
                    }

                    if ($("#minutes").val() != '') {
                        b3=$("#minutes").val()
                    }else{
                        b3=0
                    }

                    if ($("#secondes").val() != '') {
                        b4=$("#secondes").val()
                    }else{
                        b4=0
                    }

                    $("#test").load("<?php base_url(); ?>gestion/convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
                }
            );
            $("#secondes").keyup(
                function () {
                    if ($("#secondes").val() == ' ') $("#secondes").val('0');

                    if ($("#jours").val() != '') {
                        b1=$("#jours").val()
                    }else{
                        b1=0
                    }

                    if ($("#heures").val() != '') {
                        b2=$("#heures").val()
                    }else{
                        b2=0
                    }

                    if ($("#minutes").val() != '') {
                        b3=$("#minutes").val()
                    }else{
                        b3=0
                    }

                    if ($("#secondes").val() != '') {
                        b4=$("#secondes").val()
                    }else{
                        b4=0
                    }

                    $("#test").load("<?php base_url(); ?>gestion/convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
                }
            );
        }
    );
</script>