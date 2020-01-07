<title>Informations</title>
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
            <li><a href="profil">Retour au profil</a></li>
            <li><a href="Connexion/deconnexion">Deconnexion</a></li>
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
<h2>Mes informations personnelles</h2>
<?php

if(isset($_SESSION['erreur'])){
    echo '<p class="tout">'.$_SESSION['erreur'].'</p>';
    $_SESSION['erreur']='';
}

?>
<div class="content-wrap">
<div class="presentation">
    <form method="post" action="Informations/changement">
        <label>Pseudo</label>
        <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>">
        <label>E-Mail</label>
        <input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>">
        <label>Ancien mot de passe</label>
        <input type="text" name="amdp" placeholder="Ancien mot de passe">
        <label>Nouveau mot de passe</label>
        <input type="text" name="mdp" placeholder="Mot de passe">
        <label>Confirmation du nouveau mot de passe</label>
        <input type="text" name="mdp2" placeholder="Confirmation du mot de passe">
        <input type="submit" value="Valider">



    </form>
</div>
</div>