    <title>Présentation</title>
</head>
<body>
<?php
if (isset($_SESSION['pseudo'])){
    echo '<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li><a href="Accueil">Accueil</a></li>
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
            <li><a href="Accueil">Accueil</a></li>
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
<div class="content-wrap">
<div class="presentation-video">
    <video controls>
    <source src="assets/videos/animation.mp4" type="video/mp4">
</div>
<div class="presentation-buttons">
    <button><a href="<?php base_url();?>assets/pdf/letourdumonde.pdf">Télécharger le PDF</a></button>
    <button><a href="aide">Comment jouer ?</a></button>
</div>
</div>