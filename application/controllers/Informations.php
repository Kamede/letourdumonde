<?php

    class Informations extends CI_Controller {
        
        public function index() {
            $this->load->view("Header_view");
            $this->load->view("Informations_view");
            $this->load->view("Footer_view");
        }
    }

?>