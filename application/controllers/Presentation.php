<?php

    class Presentation extends CI_Controller {
        
        public function index() {
            $this->load->view("Header_view");
            $this->load->view("Presentation_view");
            $this->load->view("Footer_view");
        }
    }

?>