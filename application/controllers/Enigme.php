<?php

    class Enigme extends CI_Controller {

        public function index() {
            $this->load->model('Enigmes_model');//Charger le modèle
            $query2 =$this->db->get_where('user', array('user_pseudo' => $_SESSION['pseudo']));
            $verif2=$query2->result_array();

            //echo $verif2[0]['user_etat'];
            //echo $_SESSION['blocage']-time();
            //echo $_SESSION['pseudo'];
            //echo $verif2[0]['user_nb_erreur_actuel'];

            if ($verif2[0]['user_heure_blocage'] == 'X'){
                redirect(base_url());
            }


            if(isset($_SESSION['blocage'])) {
                if ($_SESSION['blocage'] == 0) {
                    if ($verif2[0]['user_etat'] == 0) {
                        $_SESSION['blocage'] = $verif2[0]['user_heure_blocage'];
                        redirect(base_url());
                    } else {
                        $recup = $this->Enigmes_model->recuptoutes();//Recuperer les enigmes
                        $data['toutes'] = $recup;
                        $this->load->view("Enigmes_view", $data);// Vue + envoyer les enigmes
                    }
                } else {
                    if ($_SESSION['blocage'] >= time()) {
                        echo $_SESSION['blocage'] - time();
                    } else {
                        $_SESSION['blocage'] = 0;
                        $data = array(
                            'user_heure_blocage' => 0,
                            'user_etat' => 1
                        );
                        $this->db->where('user_pseudo', $_SESSION['pseudo']);
                        $this->db->update('user', $data);

                        $recup = $this->Enigmes_model->recuptoutes();//Recuperer les menigmes
                        $data['toutes'] = $recup;
                        $this->load->view("Enigmes_view", $data);// Vue + envoyer les enigmes
                    }
                }
            }else{
                $recup = $this->Enigmes_model->recuptoutes();//Recuperer les menigmes
                $data['toutes'] = $recup;
                $this->load->view("Enigmes_view", $data);// Vue + envoyer les enigmes
            }
        }

        public function ajax() {
            $id = $_POST['id'];
            $this->load->model('Enigmes_model');//Charger le modèle
            $recup = $this->Enigmes_model->recupune($id);//Recuperer les menigmes
            $data['toutes']=$recup;
            echo json_encode($recup);
            //$this->load->view("Vue_view",$data);// Vue + envoyer les enigmes

        }

        public function enigme_id(){
            $this->load->model('Enigmes_model');//Charger le modèle
            $query=$this->db->get_where('user', array('user_pseudo' => $_SESSION['pseudo']));
            $verif=$query->result_array();
            $enigme=$verif[0]['user_enigme'];
            echo json_encode($enigme);

        }

        public function validation() {
            $data = $_POST['response_data'];
            $id = $_POST['id'];
            $this->load->model('Enigmes_model');//Charger le modèle
            $recup = $this->Enigmes_model->recupune($id);//Recuperer les menigmes
            if($data == $recup[0]['enigme_reponse'])
            {
                $response = true;
                $this->Enigmes_model->reponseok();
            }
            else
            {
                $queryve=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
                $verifve=$queryve->result_array();

                if ($verifve[0]['user_nb_erreur_actuel']==2){
                    $this->Enigmes_model->reponseko();
                    $response = 'block';
                    $this->Enigmes_model->blockmail();
                }else{
                    $response = false;
                    $this->Enigmes_model->reponseko();
                }
            }
            echo json_encode($response);
        }
    }

?>