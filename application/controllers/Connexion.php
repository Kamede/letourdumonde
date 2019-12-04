<?php

class Connexion extends CI_Controller {

    public function index() {
        $this->load->model('Connexion_model');//Charger le modèle
        $this->Connexion_model->connexion_verif();

    }


}

?>