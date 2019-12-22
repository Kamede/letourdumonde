    <title>Présentation</title>
</head>
<body>
<?php
if (isset($_SESSION['pseudo'])){
    include 'header.php';
}else{
    redirect(base_url());
}
?>
<table>
    <th class="th-first">#</th><th>Pseudo</th><th>Nombre d'enigmes résolues</th><th>Nombre de tentatives</th><th>Score</th><th class="th-last">Temps</th>
    <tr>
        <td>1</td>
        <td>Bernard l'hermite</td>
        <td>10/10</td>
        <td>0</td>
        <td>1000</td>
        <td>10s</td>

        <?php


            //var_dump($infos);


        ?>
        <?php
        /*$i=0;
        foreach ($toutes as $manif){
            echo '<div class="manif"><div class="image_div"><img class="image" src="'.base_url().'/asset/photos/'.$manif->manif_photo.'"></div>';
            echo '<div class="text"><p class="intitule texte"><i>'.strtoupper($manif->manif_intitule).'</i> - ';
            echo ''.$manif->manif_type.'</p>';
            echo '<p class="texte">Date : '.$manif->manif_date.'</p>';
            echo '<p class="texte">'.$manif->manif_description.'</p>';
            echo '<p class="texte">Salle : '.$manif->_salle_code.'</p>';
            echo '<p class="prix">'.($manif->manif_prix_place)*1.1.'$/place</p></div></div>';
            $i++;
        }*/
        ?>



    </tr>
</table>