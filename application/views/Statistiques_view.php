    <title>Statistiques</title>
</head>
<body>
<?php
if (isset($_SESSION['pseudo'])){
    include 'header.php';
}else{
    redirect(base_url());
}
?>
<div class="content-wrap">
<table>
    <th class="th-first">#</th><th>Pseudo</th><th>Nombre d'enigmes résolues</th><th>Nombre d'erreurs</th><th class="th-last">Score</th>
    <tr></tr>
    <?php

    $i=1;
    foreach ($tous as $score){

        echo '<tr><td>'.$i.'</td>';
        echo '<td>'.$score->user_pseudo.'</td>';
        echo '<td>10/10</td>';
        echo '<td>'.$score->user_nb_erreur.'</td>';
        echo '<td>'.$score->res_final.'</td><tr>';
        $i++;
    }

    ?>
</table>
</div>