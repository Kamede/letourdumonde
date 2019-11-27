<?php

    class Enigme extends CI_Controller {
        
        public function index() {
            $this->load->model('Enigmes_model');//Charger le modèle

            $recup = $this->Enigmes_model->recuptoutes();//Recuperer les menigmes
            $data['toutes']=$recup;

            $this->load->view("Enigmes_view",$data);// Vue + envoyer les enigmes


        }

        public function ajax() {
            $id = $_POST['id'];
            $this->load->model('Enigmes_model');//Charger le modèle
            $recup = $this->Enigmes_model->recupune($id);//Recuperer les menigmes
            $data['toutes']=$recup;
            echo json_encode($recup);
            //$this->load->view("Vue_view",$data);// Vue + envoyer les enigmes


        }
        public function validation() {
            $data = $_POST['response_data'];
            $id = $_POST['id'];
            $this->load->model('Enigmes_model');//Charger le modèle
            $recup = $this->Enigmes_model->recupune($id);//Recuperer les menigmes
            if($data == $recup[0]['enigme_reponse'])
            {
                $response = true;
            }
            else
            {
                $response = false;
            }
            echo json_encode($response);
        }
    }

?>