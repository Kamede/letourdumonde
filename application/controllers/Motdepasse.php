<?php

class Motdepasse extends CI_Controller {

    public function index() {
        $this->load->model('Connexion_model');//Charger le modèle
        $this->load->view("Header_view");
        $this->load->view("Motdepasse_view");
        $this->load->view("Footer_view");
    }

    public function action(){
        $this->load->model('Connexion_model');//Charger le modèle

        $this->Connexion_model->mdp();

    }
}
?>