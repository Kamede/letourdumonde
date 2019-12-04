<?php

class Connexion extends CI_Controller {

    public function index() {
        $this->load->model('Connexion_model');//Charger le modèle
        $this->Connexion_model->connexion();
    }
    public function deconnexion(){
        unset($_SESSION['pseudo']);
        unset($_SESSION['mail']);
        redirect(base_url());
    }
}

?>