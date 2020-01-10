<html>
<head>
    <title>Le Tour Du Monde En 10 Enigmes - Panneau de gestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        p {
            font-family: 'century-gothic';
            font-size: 18px;
            line-height: 27px;
            color: #222751;
        }
        ul li {
            font-family: 'century-gothic';
            font-size: 18px;
            line-height: 27px;
            color: #222751;
        }
        .boite {
            margin: 30px;
        }


    </style>
</head>

<body>
<header>
    <nav>
        <ul>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion">Accueil gestion</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/user">Utilisateurs</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/enigme">Enigmes</a></li>
        <li><a class="nav-link" href="<?php echo base_url()?>Gestion/cle">Clé d'activation</a></li>
        <li><a class="nav-link" href="<?php  echo base_url(); ?>Gestion/deconnexion">Déconnexion</a></li>
    </ul>
    </nav>
<br><br>
<div class="title">
<h1>Gestion des données</h1>
</div>
</header>
<hr>
<div class="boite">
    <p>Utilisation : Utilisateurs</p>
    <ul>
        <li>Blocage : Pour un blocage sans limite de temps, entrez "X" dans le champ "user heure blocage".</li>
        <li>Pour débloquer l'utilisateur, indiquez "0" dans ce même champ.</li>
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
    <br>
    <p>Enigmes</p>
    <ul>
        <li>Vous pouvez changer les textes et les images des énigmes, ainsi que leurs réponses, dans l'onlet "Enigmes".</li>
        <li>Pour les images, voici les dossiers où elles sont stockées, en fonction de leur rôle :</li>
        <ul>
            <li>enigme_perso -> assets/images/characters</li>
            <li>enigme_fond -> assets/images/fonds</li>
            <li>enigme_indice -> assets/images/tips</li>
            <li>Les miniatures pour les dialogues sont recherchées en fonction du nom du personnage indiqué dans le dialogue et sont stockées dans assets/images/characters_head</li>
        </ul>
        <li>Une réponse s'accompagne toujours de sa taille en nombre de caractères, ce paramètre est à compléter dans la case "enigme_reponse_taille".</li>
        <li>Nous déconseillons les changements dans cette partie : La moindre erreur peut faire arrêter le jeu. Si vous souhaitez y apporter des modifications, n'hésitez pas à contacter l'agence Blackmoon, responsable du développement du site.</li>
    </ul>
    <br>
    <p>Clés d'activation</p>
    <ul>
        <li>Une clé "active" est une clé déja utilisée, et donc qui ne peut pas être reutilisée pour un autre compte. Au contraire, une clé inactive est libre.</li>
        <li>Une clé administrateur est mise à votre disposition : ADMIN12345. Celle-ci peut être utilisée à l'infini, veillez à ne pas modifier cette ligne.</li>
    </ul>
</div>
</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(
        function () {


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

                    $("#test").load("convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)

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

                    $("#test").load("convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
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

                    $("#test").load("convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
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

                    $("#test").load("convertir/" + b1 + "/" + b2 + "/" + b3 + "/" + b4)
                }
            );
        }
    );
</script>