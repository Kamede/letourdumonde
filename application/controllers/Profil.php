<?php

    class Profil extends CI_Controller {
        
        public function index() {
            $this->load->view("Header_view");
            $this->load->view("Profil_view");
            $this->load->view("Footer_view");
        }
    }

?>