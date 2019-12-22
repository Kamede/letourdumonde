<?php

    class Informations extends CI_Controller
    {

        public function index()
        {

            if (isset($_SESSION['pseudo'])) {
                $this->load->model('Informations_model');//Charger le modèle
                $this->load->view("Header_view");
                $this->load->view("Informations_view");
                $this->load->view("Footer_view");
            } else {
                redirect(base_url());
            }
        }

        public function changement()
        {
            $this->load->model('Informations_model');//Charger le modèle

            $pseudo = $_POST['pseudo'];
            $mail = $_POST['mail'];
            $amdp = $_POST['amdp'];
            $mdp = $_POST['mdp'];
            $mdp2 = $_POST['mdp2'];

            $changement=$this->Informations_model->changement($pseudo,$mail,$mdp,$mdp2,$amdp);


        }
    }

?>