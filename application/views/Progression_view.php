    <title>Progression</title>
</head>
<body>
<?php
if (isset($_SESSION['pseudo'])){
   include 'header.php';
}else{
    redirect(base_url());
}
?>

<?php


$final=0;
foreach ($un as $score){
    $final=$final+$score->res_points;
}
echo "<p class='tout'>Ton score actuel est de ".$final." points.";
//Changer le css de ce truc si besoin (je pense que oui) et l'inclure quelque part. Ajouter les numéros dans les cercles.

?>
<div class="content-wrap">
    <div class="progression">
        <div class="fusee">
            <img class="fusee-img" src="assets/images/fusee/fusée1.svg"/>
        </div>
        <div class="progression-column">
            <div class="trait"></div>
            <div class="balise balise-1"></div>
            <div class="trait"></div>
            <div class="balise balise-2"></div>
            <div class="trait"></div>
            <div class="balise balise-3"></div>
            <div class="trait"></div>
            <div class="balise balise-4"></div>
            <div class="trait"></div>
            <div class="balise balise-5"></div>
            <div class="trait"></div>
            <div class="balise balise-6"></div>
            <div class="trait"></div>
            <div class="balise balise-7"></div>
            <div class="trait"></div>
            <div class="balise balise-8"></div>
            <div class="trait"></div>
            <div class="balise balise-9"></div>
            <div class="trait"></div>
            <div class="balise balise-10"></div>
            <div class="trait"></div>
        </div>
    </div>
</div>
    <script src="scripts/progression.js"></script>