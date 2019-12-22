<?php

    class Statistiques extends CI_Controller {
        
        public function index() {
            $this->load->model('Statistiques_model');
            //$infos["mesinfos"]=$this->Statistiques_model->recupstat();
            $this->load->view("Header_view");
            $this->load->view("Statistiques_view",$infos['mesinfos']);
            $this->load->view("Footer_view");
        }
    }

?>