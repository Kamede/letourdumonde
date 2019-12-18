<title>Présentation</title>
</head>
<body>
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
<h2>Mes informations personnelles</h2>
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

        <?php

        if(isset($_SESSION['erreur'])){
            echo $_SESSION['erreur'];
            //unset $_SESSION['erreur'];
        }

        ?>

    </form>
</div>
