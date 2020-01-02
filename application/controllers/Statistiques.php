<?php

    class Statistiques extends CI_Controller {
        
        public function index() {
            $this->load->model('Statistiques_model');
            $recup=$this->Statistiques_model->recupstat();
            $infos['tous']=$recup;
            $this->load->view("Header_view");
            $this->load->view("Statistiques_view",$infos);
            $this->load->view("Footer_view");
        }
    }

?>