    <title>Accueil</title>
</head>
<body>

<?php
if (isset($_SESSION['pseudo'])){
    echo '<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li><a href="Connexion/deconnexion">Deconnexion</a></li>
            <li><a href="profil">Mon profil</a></li>

            <li>
                <a href="enigme"><button>Jouer</button></a>
            </li>
        </ul>
    </nav>
    <div class="title">
        <img src="assets/images/index/logo_couleur.svg">
        <h1>Le tour du monde en 10 énigmes</h1>
    </div>
</header>';
}else{
    echo '<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li class="popup-li" data-popup=\'connexion\'>Connexion</li>
            <li class="popup-li" data-popup=\'inscription\'>Inscription</li>
            <li>
                <button class="popup-li" data-popup=\'connexion\'>Jouer</button>
            </li>
        </ul>
    </nav>
    <div class="title">
        <img src="assets/images/index/logo_couleur.svg">
        <h1>Le tour du monde en 10 énigmes</h1>
    </div>
</header>';
}
?>
<?php

if(isset($_SESSION['erreur'])){
    echo '<p class="tout">'.$_SESSION['erreur'].'</p>';
    $_SESSION['erreur']='';
}

?>
<div id="rules">
    <h2>Règles du jeu</h2>
    <p>
        Un petit spationaute s'écrase avec sa fusée sur la terre. Il réussi de justesse à s'éjecter avant le crash avec sa mongolfière. Mais les morceaux de sa fusée s'éparpillent tout autour du monde.
        <br><br>Pars à la découverte du monde pour l'aider à recomposer sa fusée et repartir sur la Lune. Un beau cadeau t'attends à la fin de ton aventure !<span><a href="Aide">Suite</a></span>
    </p>
</div>
<div id="sky">
    <video id="video" style="width:100%; height:100%" autoplay loop muted>
        <source src="assets/images/banner.mp4" type="video/mp4">
    </video>
</div>