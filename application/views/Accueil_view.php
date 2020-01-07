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
            <li><a href="Connexion/deconnexion">Déconnexion</a></li>
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
<div class="content-wrap">
<div id="rules">
    <h2>Règles du jeu</h2>
    <p>
        <strong>Un petit spationaute</strong> s'écrase avec sa <strong>fusée</strong> sur la terre. Il réussi de justesse à s'éjecter avant le crash avec sa <strong>mongolfière</strong>. Mais les morceaux de sa fusée s'éparpillent <strong>tout autour du monde</strong>.
        <br><br>Pars à la découverte du monde pour l'aider à recomposer sa fusée et <strong>repartir sur la Lune</strong>. Un beau <strong>cadeau</strong> t'attends à la fin de ton <strong>aventure !</strong><span><a href="Aide">Suite</a></span>
    </p>
</div>
<div id="sky">
    <video id="video" style="width:100%; height:100%" autoplay loop muted>
        <source src="assets/images/banner.mp4" type="video/mp4">
    </video>
</div>
</div>