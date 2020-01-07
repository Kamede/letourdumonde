    <title>Comment jouer ?</title>
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
<div class="aide">
    <h2>Comment jouer ?</h2>
    <p>     - Pour commencer, tu devras obtenir le <strong>livre</strong> qui accompagne le site. Tu peux l'acheter chez un <strong>libraire</strong>, le commander sur <strong>Internet</strong> ou télécharger la version <strong>numérique</strong> (PDF disponible dans la page profil).</p>
    <p>     - Sur le livre sera écrit un code à utilisation unique qui te permettra de <strong>créer un compte</strong>    sur le site : tu peux demander à tes <strong>parents</strong> de t'aider. Une fois ton compte créé, il ne te restera plus qu'à cliquer sur "<strong>Jouer</strong>" en haut à droite de la page. </p>
    <p>     - À chaque nouveau pays, tu feras la rencontre d’un <strong>nouveau personnage</strong>. Ce personnage te donnera un <strong>morceau de fusée</strong> si tu l’aides à résoudre une énigme. Plusieurs réponses te seront proposées sur le <strong>livre</strong>, mais <strong>une</strong> seule d’entre elles est la bonne.</p>
    <p>     - Une fois la <strong>bonne réponse</strong> trouvée, rentre-la dans le formulaire au milieu de la page. Si c’est la <strong>bonne réponse</strong>, tu obtiendras un <strong>morceau de fusée</strong>.</p>
    <p>     - Attention : si tu rentres <strong>trois fois</strong> une <strong>mauvaise réponse</strong> dans une énigme, tu seras bloqué pendant <strong>trois minutes</strong>. Trois nouvelles chances te seront données une fois ces trois minutes écoulées.</p>
    <p>     - Ta progression est <strong>automatiquement sauvegardée</strong> si tu quittes le site. Lors de ta prochaine connexion, tu pourras reprendre là où tu t’étais arrêté.</p>


</div>