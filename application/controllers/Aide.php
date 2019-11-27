<?php

    class Aide extends CI_Controller {
        
        public function index() {
            $this->load->view("Header_view");
            $this->load->view("Aide_view");
            $this->load->view("Footer_view");
        }
    }

?>