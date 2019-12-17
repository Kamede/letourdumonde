<?php
class Gestion_model extends CI_Model{

    public function convertirmodel($jours,$heures,$minutes,$secondes){
        $jours_final=$jours*24*60*60;
        $heures_final=$heures*60*60;
        $minutes_final=$minutes*60;
        $resultat=$jours_final+$heures_final+$minutes_final+$secondes;

        echo $resultat;
        echo ' secondes de blocage';
        echo '<br>';
        echo 'Temps à entrer dans le champ user heure blocage :';
        echo $resultat+time();
    }

}
