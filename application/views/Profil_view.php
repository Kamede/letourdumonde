    <title>Profil</title>
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
            <li><a href="'.base_url().'Connexion/deconnexion">Deconnexion</a></li>
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
    redirect(base_url());
}
?>
<div class="profil-wrapper">
    <div class="profil-wrapper__left">
        <div>
            <h3>Bienvenue <?php echo $_SESSION['pseudo'] ?> !</h3>
            <ul>
                <li><a class="profil-links" href="presentation">Présentation du jeu</a></li>
                <li><a class="profil-links" href="assets/pdf/letourdumonde.pdf">Télécharger le PDF</a></li>
                <li><a class="profil-links" href="progression">Voir l'avancement dans le jeu</a></li>
                <li><a class="profil-links" href="Statistiques">Consulter les statistiques</a></li>
                <li><a class="profil-links" href="Informations">Modifier les informations</a></li>
            </ul>
        </div>
    </div>
    <div class="profil-wrapper__right">
        <a href="Enigme"><button>Jouer</button></a>
    </div>
</div>
<div id="sky">
    <video id="video" style="width:100%; height:100%" autoplay loop muted>
        <source src="assets/images/banner.mp4" type="video/mp4">
    </video>
</div>