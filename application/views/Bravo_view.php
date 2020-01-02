<title>Bravo !</title>
</head>
<body>
<?php

if ($_SESSION['enigme']!=11){
    redirect(base_url());
}

if (isset($_SESSION['pseudo'])){
    echo '<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li><a href="Accueil">Accueil</a></li>
            <li><a href="Profil">Profil</a></li>
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
<h2>Félicitations !</h2>

<p class="tout">Tu as terminé le jeu ! </p>
<p class="tout">Ton score est de
<?php
$final=0;
foreach ($un as $score){
    $final=$final+$score->res_points;
}
echo $final;
?>
 points.</p>
<p class="tout">Merci pour ton courage et ta détermination, apprenti astronaute ! Grâce à toi, notre ami a pu rejoindre sa planète !<br> Il t'a laissé ce petit cadeau avant de partir : une carte cadeau de 5€ chez Nature & découvertes, pour te mettre des étoiles plein les yeux !</p>
<div style="text-align: center;">
    <a href="<?php base_url();?>assets/images/cadeau.jpg"><img src="<?php base_url();?>assets/images/cadeau.jpg" height="250px"></a>
</div>
<br>
<p class="tout">Tu peux consulter tes statistiques finales afin de voir ton score ainsi que celui des autres aventuriers ! <a href="Statistiques">Voir les statistiques</a> </p>
<p class="tout">À bientôt pour de nouvelles aventures !</p>

