<?php
class Informations_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function changement($pseudo,$mail,$mdp,$mdp2,$amdp){

        $query = $this->db->get_where('user', array('user_pseudo' => $pseudo));
        $query_2 = $this->db->get_where('user', array('user_email' => $mail));

        $verif_1 = $query->result_array();
        $verif_2 = $query_2->result_array();

        if (!isset($pseudo) || !isset($mail) || !isset($amdp) || !isset($mdp) || !isset($mdp2)) {
            $_SESSION['erreur'] = "Veuillez remplir tous les champs";
            redirect(base_url().'Informations');

        } else {
            $query = $this->db->get_where('user', array('user_pseudo' => $_SESSION['pseudo']));
            $verif = $query->result_array();

            if (password_verify($amdp, $verif[0]['user_mdp'])==false) {
                $_SESSION['erreur'] = "Erreur de mot de passe";
                redirect(base_url().'Informations');

            } else {
                if (!empty($verif_1)) {
                    if ($verif_1[0]['user_pseudo']!=$_SESSION['pseudo']){}
                    $_SESSION['erreur']="Ce pseudo est déja utilisé.".$pseudo.' '.$_SESSION['pseudo'];
                    redirect(base_url().'Informations');
                } else if ($verif_2[0]['user_email']!=$_SESSION['mail']) {
                    $_SESSION['erreur'] = "Cette adresse mail est déja utilisée";
                    redirect(base_url().'Informations');
                } else {
                    if ($mdp != $mdp2) {
                        $_SESSION['erreur'] = "Les nouveaux mots de passe ne correspondent pas.";
                        redirect(base_url() . 'Informations');
                    } else {
                        $mdp_final = password_hash($mdp, PASSWORD_BCRYPT);
                        $data = array('user_pseudo' => $pseudo, 'user_email' => $mail, 'user_mdp' => $mdp_final);
                        $where = "user_pseudo = '" . $_SESSION['pseudo'] . "'";
                        $modif = $this->db->update('user', $data, $where);
                        $_SESSION['erreur'] = 'Changements effectués !';



                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['mail'] = $mail;
                        redirect(base_url() . 'Informations');
                    }
                }


            }
        }


    }
}