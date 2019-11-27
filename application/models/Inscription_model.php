<?php
class Inscription_model extends CI_Model {

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

    public function envoiemailconfirmation($email,$pseudo){
        $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From:'.$envoi."\r\n";
        $sujet = "Message de confirmation d'inscription | Le Tour Du Monde En 10 Enigmes";
        $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Bienvenue petit astronaute ! | Le Tour Du Monde En 10 Enigmes</h1>
			        <br>
			        <p>Bienvenue sur notre site '.$pseudo.' ! Prépare-toi à faire ton entrée dans une aventure extraordinaire !</p>
			        <br>
			        <p>Merci d\'avoir pris part au jeu, nous te confirmons que ton inscription a bien été effectuée ! </p>
			        <p>Tu peux jouer dès maintenant à cette adresse : http://89.234.183.207/letourdumonde</p>
			        <br>
			        <p>À bientôt !</p>
			        <br><br>
			        <p>L\'équipe du Tour du monde en 10 énigmes</p>
			        <br><br>
			        <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>
			        ';
        $retour = mail($email, $sujet, $message, $entete);
    }

    public function inscription(){
        $pseudo=$this->input->post('pseudo');
        $mail=$this->input->post('mail');
        $mdp=$this->input->post('mdp');
        $mdp_conf=$this->input->post('mdp_conf');
        $code=$this->input->post('code');

        $query = $this->db->get('user');
        return $query->result_array();



        if($mdp == $mdp_conf){
            echo $pseudo;
        }else{
            echo "mdp erreur";
        }


    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }









}