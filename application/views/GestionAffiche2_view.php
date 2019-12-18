<html>
<head>
    <title>Le Tour Du Monde En 10 Enigmes - Panneau de gestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.css.map">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    foreach ($css_files as $file):?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file ?>">
    <?php endforeach;?>
</head>


<body>
<ul>
    <li><a href="<?php echo base_url()?>Gestion/">Accueil gestion</a></li>
    <li><a href="<?php echo base_url()?>Gestion/user">Utilisateurs</a></li>
    <li><a href="<?php echo base_url()?>Gestion/enigme">Enigmes</a></li>
    <li><a href="<?php echo base_url()?>Gestion/cle">Clé d'activation</a></li>
    <li><a href="<?php  echo base_url(); ?>Login/Logout">Deconnexion</a></li>
</ul>
<br><br>
<h1>Gestion des données</h1>


<hr>
<?php echo $output ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file ?>"></script>
<?php endforeach; ?>
</body>


</html>
