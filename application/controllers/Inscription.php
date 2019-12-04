<?php

class Inscription extends CI_Controller {

    public function index() {
        $this->load->model('Inscription_model');//Charger le modèle
        $this->Inscription_model->inscription_verif();

    }

}

?>