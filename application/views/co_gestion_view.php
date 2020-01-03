<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <title>Gestion - connexion</title>
</head>
<body>
<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li><a href="Accueil">Accueil</a></li>
            <li>
                <a href="Accueil"><button class="popup-li">Jouer</button></a>
            </li>
        </ul>
    </nav>
    <div class="title">
        <img src="assets/images/index/logo_couleur.svg">
        <h1>Le tour du monde en 10 énigmes</h1>
    </div>
</header>

<h2>Connexion à la partie gestion</h2>

<p class="tout">Cette partie est réservée aux administrateurs du site. Si vous souhaitez accéder au jeu, rendez-vous sur la page d'accueil, puis connectez-vous depuis le formulaire disponible en haut de la page, onglet "Connexion".</p>

<?php

if(isset($_SESSION['erreur'])){
    echo '<p class="tout">'.$_SESSION['erreur'].'</p>';
    $_SESSION['erreur']='';
}

?>
<div class="presentation">
    <form method="post" action="Gestion/connexion">
        <label>Identifiant</label>
        <input type="text" name="id" placeholder="Identifiant" ">
        <label>Mot de passe</label>
        <input type="text" name="mdp" placeholder="Mot de passe" ">
        <input type="submit" value="Valider">
    </form>
</div>