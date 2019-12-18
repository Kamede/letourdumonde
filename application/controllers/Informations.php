<?php

    class Informations extends CI_Controller
    {

        public function index()
        {

            if (isset($_SESSION['pseudo'])) {
                $this->load->view("Header_view");
                $this->load->view("Informations_view");
                $this->load->view("Footer_view");
            } else {
                redirect(base_url());
            }
        }

        public function changement()
        {
            $pseudo = $_POST['pseudo'];
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $mdp2 = $_POST['mdp2'];

            if (!isset($pseudo) || !isset($mail) || !isset($amdp) || !isset($mdp) || !isset($mdp2)) {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs";
            } else {
                $query = $this->db->get_where('user', array('user_pseudo' => $pseudo));
                $verif_1 = $query->result_array();

                if (password_verify($amdp, $verif_1[0]['user_mdp'])) {


                }else{
                    $_SESSION['erreur'] = "Erreur de mot de passe";
                }
            }
        }
    }

?>