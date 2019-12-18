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
            <li><a href="'.base_url().'Connexion/deconnexion">Deconnexion</a></li>
            <li><a href="'.base_url().'Enigme">Enigme</a></li>

            <li>
                <button>Jouer</button>
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
                <li>Télécharger le PDF</li>
                <li>Voir l'avancement dans le jeu</li>
                <li><a href="Statistiques">Consulter les statistiques</a></li>
                <li><a href="Informations">Modifier les informations</a></li>
            </ul>
        </div>
    </div>
    <div class="profil-wrapper__right">
        <a href="Enigme"><button>Jouer</button></a>
    </div>
</div>