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
                if (!empty($verif_1)||!empty($verif_2)) {
                    if (!empty($verif_1)) {
                        if ($pseudo != $_SESSION['pseudo']) {
                            $_SESSION['erreur'] = "Ce pseudo est déja utilisé.";
                            redirect(base_url() . 'Informations');
                        }
                    }
                    if (!empty($verif_2)) {
                        if ($verif_2[0]['user_email'] != $_SESSION['mail']) {
                            $_SESSION['erreur'] = "Cette adresse mail est déja utilisée";
                            redirect(base_url() . 'Informations');
                        }
                    }
                }

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

                            $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
                            $entete = 'MIME-Version: 1.0' . "\r\n";
                            $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                            $entete .= 'From:' . $envoi . "\r\n";
                            $sujet = "Changements effectués sur le profil | Le Tour Du Monde En 10 Enigmes";
                            $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Vous avez effectué des changements sur votre profil. | Le Tour Du Monde En 10 Enigmes</h1>
                            <br>
                            <p>Bonjour ' . $_SESSION['pseudo'] . ' !</p>
                            <br>
                            <p>Tu as effectué des changements sur ton profil, voici tes nouvelles informations :  </p>
                            <p>Pseudo : '.$pseudo.'</p>
                            <p>Adresse e-mail : '.$mail.'</p>
                            <br>
                            <p>À bientôt !</p>
                            <br><br>
                            <p>L\'équipe du Tour du monde en 10 énigmes</p>
                            <br><br>
                            <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>';
                            $retour = mail($mail, $sujet, $message, $entete);
                            redirect(base_url() . 'Informations');
                        }
                    }
                }
            }
        }

