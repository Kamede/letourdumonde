<title>Mot de passe oublié</title>
</head>
<body>
<?php
if (isset($_SESSION['pseudo'])){
    redirect(base_url());
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
<h2>Réinitialisation de mot de passe</h2>
<?php

if(isset($_SESSION['erreur'])){
    echo '<p class="tout">'.$_SESSION['erreur'].'</p>';
    $_SESSION['erreur']='';
}

?>
<div class="presentation">
    <form method="post" action="Motdepasse/action">
        <label>Pseudo</label>
        <input type="text" name="pseudo" placeholder="Pseudo" ">
        <label>Adresse e-mail</label>
        <input type="text" name="mail" placeholder="E-mail" ">
        <input type="submit" value="Valider">
    </form>
</div>