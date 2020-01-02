<?php

    class Progression extends CI_Controller {
        
        public function index() {
            $this->load->model('Statistiques_model');//Charger le modèle
            $this->load->view("Header_view");
            $recup=$this->Statistiques_model->recupunstat();
            $infos['un']=$recup;
            $this->load->view("Progression_view",$infos);
            $this->load->view("Footer_view");
        }
    }
?>