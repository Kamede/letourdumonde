<?php

    class Progression extends CI_Controller {
        
        public function index() {
            $this->load->model('Connexion_model');//Charger le modèle
            $this->load->view("Header_view");
            $this->load->view("Progression_view");
            $this->load->view("Footer_view");
        }
    }
?>