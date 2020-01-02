<html>
<head>
    <title>Le Tour Du Monde En 10 Enigmes - Panneau de gestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    foreach ($css_files as $file):?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file ?>">
    <?php endforeach;?>
    <style>
        p {
            font-family: 'century-gothic';
            font-size: 18px;
            line-height: 27px;
            color: #222751;
        }
        ul li {
            font-family: 'century-gothic';
            font-size: 18px;
            line-height: 27px;
            color: #222751;
        }
        .boite {
            margin: 30px;
        }


    </style>
</head>


<body>
<header>
    <nav>
        <ul>
            <li><a class="nav-link" href="<?php echo base_url()?>Gestion/">Accueil gestion</a></li>
            <li><a class="nav-link" href="<?php echo base_url()?>Gestion/user">Utilisateurs</a></li>
            <li><a class="nav-link" href="<?php echo base_url()?>Gestion/enigme">Enigmes</a></li>
            <li><a class="nav-link" href="<?php echo base_url()?>Gestion/cle">Clé d'activation</a></li>
            <li><a class="nav-link" href="<?php  echo base_url(); ?>Gestion/deconnexion">Deconnexion</a></li>
        </ul>
    </nav>
    <br><br>
    <div class="title">
        <h1>Gestion des données</h1>
    </div>
</header>
<div class="boite">
<p> Vous pouvez ici consulter les données des utilisateurs : Leur énigme actuelle, leur nombre d'erreurs, ...</p>
<p>Vous pouvez également modifier ces données, ainsi que bloquer un utilisateur. Pour cela, suivez les indications à propos du blocage.</p>
</div>
    <hr>
<?php echo $output ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file ?>"></script>
<?php endforeach; ?>
</body>


</html>
