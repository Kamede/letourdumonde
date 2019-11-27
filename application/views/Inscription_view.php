<div class="popup"></div>
<div class="dim"></div>
<header>
    <nav>
        <ul>
            <li data-popup='connexion'>Connexion</li>
            <li data-popup='inscription'>Inscription</li>
            <li>
                <button>Jouer</button>
            </li>
        </ul>
    </nav>
    <div class="title">
        <img src="assets/images/index/logo_couleur.svg">
        <h1>Le tour du monde en 10 énigmes</h1>
    </div>
</header>
<div id="rules">
    <h2>Règles du jeu</h2>
    <p>
        Un petit spationaute s'écrase avec sa fusée sur la terre. Il réussi de justesse à s'éjecter avant le crash avec sa mongolfière. Mais les morceaux de sa fusée s'éparpillent tout autour du monde.
        <br><br>Pars à la découverte du monde pour l'aider à recomposer sa fusée et repartir sur la Lune.<span>Suite</span>
    </p>

    <p>Inscription</p>
    <form method="post" action='inscription_valid'>
        <label for="pseudo">Pseudo</label><input name="pseudo" type="text">
        <label for="email">Email</label><input name="email" type="text">
        <label for="mdp">Mot de passe</label><input name="mdp" type="text">
        <label for="code">Code d'activation</label><input name="code" type="text">
        <input type="submit">
    </form>




</div>
<div id="sky">
    <video id="video" style="width:100%; height:100%" autoplay loop muted>
        <source src="assets/images/banner.mp4" type="video/mp4">
    </video>
</div>