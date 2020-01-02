<?php
class Gestion_model extends CI_Model{

    public function convertirmodel($jours,$heures,$minutes,$secondes){
        $jours_final=$jours*24*60*60;
        $heures_final=$heures*60*60;
        $minutes_final=$minutes*60;
        $resultat=$jours_final+$heures_final+$minutes_final+$secondes;

        echo '<p>';
        echo $resultat;
        echo ' secondes de blocage';
        echo '<br>';
        echo 'Temps à entrer dans le champ user heure blocage : ';
        if ($resultat==0){
            echo 0;
        }else {
            echo $resultat + time();
        }
        echo '</p>';


    }

}
