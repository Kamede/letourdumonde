<?php

    class Accueil extends CI_Controller {
        
        public function index() {
            $this->load->model('Connexion_model');//Charger le modèle
            $this->load->view("Header_view");
            $this->load->view("Accueil_view");
            $this->load->view("Footer_view");
        }
    }
?>