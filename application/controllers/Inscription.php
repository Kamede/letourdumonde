<?php

class Inscription extends CI_Controller {

    public function index() {
        $this->load->model('Inscription_model');//Charger le modèle

        //$this->Inscription_model->envoiemailconfirmation('camille.mestrude@etudiant.univ-reims.fr','Kamede'); // Envoie de mail de confirmation
        //$this->Inscription_model->envoiemailconfirmation('drossproduction57@gmail.com','Sergen'); // Envoie de mail de confirmation
        //$this->Inscription_model->envoiemailconfirmation('jules.sab132@outlook.fr','Xx_JujuDu51_xX'); // Envoie de mail de confirmation

        $this->Inscription_model->inscription_verif();

    }

}

?>