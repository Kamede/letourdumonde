<?php
class Inscription_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function recuptoutes()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }


    public function inscription_verif(){

        $pseudo=$this->input->post('pseudo');
        $mail=$this->input->post('mail');
        $mdp=$this->input->post('mdp');
        $mdp_conf=$this->input->post('mdp_conf');
        $code=$this->input->post('code');

        if (empty($pseudo)||empty($mail)||empty($code)){
            $_SESSION['erreur']="Veuillez remplir tous les champs.";
        } else {
            $query = $this->db->get_where('user', array('user_pseudo' => $pseudo));
            $query_2 = $this->db->get_where('user', array('user_email' => $mail));
            $query_3 = $this->db->get_where('cle', array('cle_numero' => $code));

            $verif_1 = $query->result_array();
            $verif_2 = $query_2->result_array();
            $verif_3 = $query_3->result_array();

            if (!empty($verif_3)) {
                //var_dump($verif_3[0]['cle_etat']);
                if ($verif_3[0]['cle_etat'] == 1) {
                    $_SESSION['erreur'] = "Cette clé d'activation est déja utilisée pour un autre compte";
                    redirect(base_url());
                } else if ($verif_3[0]['cle_etat'] == 0) {
                    if (!empty($verif_1)) {
                        $_SESSION['erreur']="Ce pseudo est déja utilisé.";
                        redirect(base_url());
                    } else if (!empty($verif_2)) {
                        $_SESSION['erreur'] = "Cette adresse mail est déja utilisée";
                        redirect(base_url());
                    } else {
                        if (empty($mdp) || empty($mdp_conf)) {
                            $_SESSION['erreur'] = "Veuillez entrer un mot de passe ainsi que la vérification de mot de passe.";
                            redirect(base_url());
                        } else {
                            if ($mdp != $mdp_conf) {
                                $_SESSION['erreur'] = "Les mots de passe ne correspondent pas.";
                                redirect(base_url());
                            } else {
                                $mdp_final = password_hash($mdp, PASSWORD_BCRYPT);
                                $data = array('user_pseudo' => $pseudo, 'user_email' => $mail, 'user_mdp' => $mdp_final, 'user_cle' => $code, 'user_etat' => 1, 'user_enigme' => 1);
                                $inscription = $this->db->insert('user', $data);

                                $query_4 = $this->db->get_where('user', array('user_pseudo' => $pseudo));
                                $activ = $query_4->result_array();

                                //passer de 0 a 1 pour activer la clé
                                $cle_id = $verif_3[0]['cle_id'];
                                if ($cle_id != 1) {
                                    $data_2 = array('cle_etat' => 1);
                                    $where_2 = "cle_id = " . $cle_id;
                                    $desactivation_cle = $this->db->update('cle', $data_2, $where_2);
                                }

                                $id = $activ[0]['user_id'];
                                $cle_id = $verif_3[0]['cle_id'];
                                $data_3 = array('_user_id' => $id);
                                $where_3 = "cle_id = " . $cle_id;
                                $liage_compte_cle = $this->db->update('cle', $data_3, $where_3);

                                $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
                                $entete = 'MIME-Version: 1.0' . "\r\n";
                                $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                                $entete .= 'From:' . $envoi . "\r\n";
                                $sujet = "Message de confirmation d'inscription | Le Tour Du Monde En 10 Enigmes";
                                $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Bienvenue petit astronaute ! | Le Tour Du Monde En 10 Enigmes</h1>
                            <br>
                            <p>Bienvenue sur notre site ' . $pseudo . ' ! Prépare-toi à faire ton entrée dans une aventure extraordinaire !</p>
                            <br>
                            <p>Merci d\'avoir pris part au jeu, nous te confirmons que ton inscription a bien été effectuée ! </p>
                            <p>Tu peux jouer dès maintenant à cette adresse : http://89.234.183.207/letourdumonde</p>
                            <p>Voici les informations que tu as entrées lors de ton inscription :</p>
                            <p>Pseudo : ' . $pseudo . '</p>
                            <p>Adresse Mail : ' . $mail . '</p>
                            <p>Clé d\'activation : ' . $code . '</p>
                            <br>
                            <p>À bientôt !</p>
                            <br><br>
                            <p>L\'équipe du Tour du monde en 10 énigmes</p>
                            <br><br>
                            <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>';
                                $retour = mail($mail, $sujet, $message, $entete);
                                $_SESSION['erreur'] = '';
                                $_SESSION['pseudo'] = $pseudo;
                                $_SESSION['user_id'] = $activ[0]['user_id'];
                                $_SESSION['mail'] =$mail;
                                $_SESSION['enigme']=1;
                                $_SESSION['connecte']="oui";
                                redirect(base_url().'profil');
                            }
                        }
                    }
                }
            }else{
                $_SESSION['erreur']="Clé d'activation invalide.";
                redirect(base_url());
            }
        }
    }











}