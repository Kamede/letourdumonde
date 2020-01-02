<?php

class CGU extends CI_Controller {

    public function index() {
        $this->load->view("Header_view");
        $this->load->view("CGU_view");
        $this->load->view("Footer_view");
    }
}
?>