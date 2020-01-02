<?php
class Connexion_model extends CI_Model
{
    protected $pseudo;
    protected $email;
    protected $cle;
    protected $mdp;
    protected $etat;

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

    public function connexion_action(){
        if (isset($_SESSION['connecte'])){
            redirect(base_url().'test');
        }else{
            redirect(base_url());
        }
    }

    public function connexion(){

        $pseudo=$this->input->post('pseudo');
        $mdp=$this->input->post('mdp');

        if (empty($pseudo)||empty($mdp)){
            $_SESSION['erreur']="Veuillez remplir tous les champs.";
            redirect(base_url());
        } else {
            $query = $this->db->get_where('user', array('user_pseudo' => $pseudo));
            $verif_1 = $query->result_array();

            if (empty($verif_1)) {
                $_SESSION['erreur'] = "Ce pseudo n'est pas valide";
                redirect(base_url());
            } else {

                if ($verif_1[0]['user_heure_blocage'] != 0){
                    if ($verif_1[0]['user_heure_blocage'] >= time()) {
                        $temps=$verif_1[0]['user_heure_blocage'] - time();
                        $_SESSION['erreur'] = "Votre compte est bloqué. Temps restant : ".$temps." secondes.";
                        redirect(base_url());
                    } else {
                        $data = array(
                            'user_heure_blocage' => 0,
                            'user_etat' => 1
                        );
                        $this->db->where('user_pseudo', $pseudo);
                        $this->db->update('user', $data);
                    }

                }


                if (password_verify($mdp, $verif_1[0]['user_mdp'])) {
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['user_id'] = $verif_1[0]['user_id'];
                    $_SESSION['mail'] =$verif_1[0]['user_email'];
                    $_SESSION['enigme']=$verif_1[0]['user_enigme'];
                    $_SESSION['tentatives']=0;
                    redirect(base_url().'profil');
                } else {

                    if (isset($_SESSION['tentatives'.$pseudo])){
                        $_SESSION['tentatives'.$pseudo]=$_SESSION['tentatives'.$pseudo]+1;
                        $_SESSION['erreur'] = "Le mot de passe est invalide.";

                        if ($_SESSION['tentatives'.$pseudo]==3){
                            $_SESSION['tentatives'.$pseudo]=0;
                            $_SESSION['erreur']='Votre compte a été désactivé suite à trois erreurs d\'authentification, veuillez réessayer dans quelques minutes.';


                            $moment_present=time();
                            $moment_futur= $moment_present+180; //remettre 180 après

                            $data=array(
                                'user_heure_blocage'=>$moment_futur,
                                'user_etat'=>0
                            );
                            $this->db->where('user_pseudo', $pseudo);
                            $this->db->update('user', $data);

                            $mail=$verif_1[0]['user_email'];

                            $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
                            $entete = 'MIME-Version: 1.0' . "\r\n";
                            $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                            $entete .= 'From:' . $envoi . "\r\n";
                            $sujet = "Compte bloqué temporairement | Le Tour Du Monde En 10 Enigmes";
                            $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Votre compte à été momentanément bloqué. | Le Tour Du Monde En 10 Enigmes</h1>
                            <br>
                            <p>Bonjour ' . $_SESSION['pseudo'] . ' !</p>
                            <br>
                            <p>Ton compte à été bloqué pour une durée de trois minutes car tu as fait trois erreurs de connexion. </p>
                            <p>Pas de panique ! Ton accès au jeu te sera rendu rapidement !</p>
                            <br>
                            <p>Si tu n\as pas commis d\'erreur, il est possible que ton compte ai été bloqué par un administrateur pour une durée indeterminée. Il te sera rendu au plus vite !</p>
                            <br>
                            <p>À bientôt !</p>
                            <br><br>
                            <p>L\'équipe du Tour du monde en 10 énigmes</p>
                            <br><br>
                            <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>';
                            $retour = mail($mail, $sujet, $message, $entete);
                        }


                    }else{
                        $_SESSION['tentatives'.$pseudo]=1;
                        $_SESSION['erreur'] = "Le mot de passe est invalide.";
                    }

                    redirect(base_url());
                }
            }
        }
    }

    public function deconnexion(){
        unset($_SESSION);
        redirect(base_url());
    }

    public function mdp(){

        $pseudo=$this->input->post('pseudo');
        $mail=$this->input->post('mail');

        if (!empty($pseudo)&&!empty($mail)){

            $query = $this->db->get_where('user', array('user_pseudo' => $pseudo));
            $verif = $query->result_array();

            if ($mail==$verif[0]['user_email']){

                $new=rand(100000,999999);

                $newhash = password_hash($new, PASSWORD_BCRYPT);
                $data = array('user_mdp' => $newhash);
                $where = "user_pseudo = '" . $pseudo . "'";
                $modif = $this->db->update('user', $data, $where);

                $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
                $entete = 'MIME-Version: 1.0' . "\r\n";
                $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $entete .= 'From:' . $envoi . "\r\n";
                $sujet = "Changement de mot de passe | Le Tour Du Monde En 10 Enigmes";
                $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Voici votre nouveau mot de passe !. | Le Tour Du Monde En 10 Enigmes</h1>
                            <br>
                            <p>Bonjour ' . $pseudo . ' !</p>
                            <br>
                            <p>Tu as fait une demande de réinitialisation de mot de passe sur notre site, voici ton nouveau mot de passe : '.$new.'</p>
                            <p>Nous te conseillons de le changer au plus vite sur ta page profil !</p>
                            <br>
                            <p>Si tu n\'as pas demandé ce changement, pas de panique ! Connecte toi avec le nouveau mot de passe et rends toi sur ta page profil pour le changer !</p>
                            <br>
                            <p>À bientôt !</p>
                            <br><br>
                            <p>L\'équipe du Tour du monde en 10 énigmes</p>
                            <br><br>
                            <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>';
                $retour = mail($mail, $sujet, $message, $entete);




                $_SESSION['erreur']='Vous avez reçu un nouveau mot de passe par mail !';
                redirect(base_url().'Motdepasse');

            }else{
                $_SESSION['erreur']='Erreur lors de l\'entrée des informations.';
                redirect(base_url().'Motdepasse');
            }

        }else{
            $_SESSION['erreur']='Veuillez remplir tous les champs.';
            redirect(base_url().'Motdepasse');
        }

    }


}


