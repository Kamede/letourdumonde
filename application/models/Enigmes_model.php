<?php
class Enigmes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /*public function verifblocage(){
        $query=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
        $verif=$query->result_array();
        $heure_actuelle=time();
        if ($verif[0]['user_heure_blocage']>=$heure_actuelle){
            $_SESSION['erreur']='Temps de blocage restant'.($verif[0]['user_heure_blocage']-$heure_actuelle);
            redirect(base_url());
        }else{
            //deblocage -> bdd changer 1 en 0 reset heure blocage
            $data=array(
                'user_heure_blocage'=>0,
                'user_etat'=>0
            );
                $this->db->where('user_pseudo', $_SESSION['pseudo']);
                $this->db->update('user', $data);
            redirect(base_url());
        }
    }*/

    public function recuptoutes()
    {
        $query = $this->db->get('enigme');
        return $query->result_array();
    }
    public function recupune($id)
    {
        $query =$this->db->get_where('enigme', array('enigme_id' => $id));
        return $query->result_array();
    }
    public function reponseok(){
        $query=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
        $verif=$query->result_array();
        $data=array(
            'user_nb_erreur_actuel'=>0,
            'user_enigme'=>$verif[0]['user_enigme']+1,
        );
        $this->db->where('user_pseudo', $_SESSION['pseudo']);
        $this->db->update('user', $data);
    }
    public function reponseko(){
        $moment_present=time();
        $moment_futur= $moment_present+30; //remettre 180 après

        $query=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
        $verif=$query->result_array();

        if ($verif[0]['user_nb_erreur_actuel']==2){
            $data=array(
                'user_nb_erreur_actuel'=>0,
                'user_nb_erreur'=>$verif[0]['user_nb_erreur']+1,
                'user_heure_blocage'=>$moment_futur,
                'user_etat'=>0
            );
            $this->db->where('user_pseudo', $_SESSION['pseudo']);
            $this->db->update('user', $data);
            $_SESSION['blocage']=$moment_futur;

        }else{
            $data=array(
                'user_nb_erreur_actuel'=>$verif[0]['user_nb_erreur_actuel']+1,
                'user_nb_erreur'=>$verif[0]['user_nb_erreur']+1,
        );
            $this->db->where('user_pseudo', $_SESSION['pseudo']);
            $this->db->update('user', $data);
        }

    }

    public function blockmail(){
        $query=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
        $verif=$query->result_array();

        $mail=$verif[0]['user_email'];

        $envoi = 'camille.mestrude@etudiant.univ-reims.fr';
        $entete = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From:' . $envoi . "\r\n";
        $sujet = "Compte bloqué temporairement | Le Tour Du Monde En 10 Enigmes";
        $message = '<div style="padding: 10px;padding-bottom:0;color: black;"><h1>Votre compte à été momentanément bloqué. | Le Tour Du Monde En 10 Enigmes</h1>
                            <br>
                            <p>Bonjour ' . $_SESSION['pseudo'] . ' !</p>
                            <br>
                            <p>Ton compte à été bloqué pour une durée de trois minutes car tu as fait trois erreurs sur une de tes énigmes. </p>
                            <p>Pas de panique ! Ton accès au jeu te sera rendu rapidement !</p>
                            <br>
                            <p>Si tu n\as pas commis d\'erreur dans le jeu, il est possible que ton compte ai été bloqué par un administrateur pour une durée indeterminée. Il te sera rendu au plus vite !</p>
                            <br>
                            <p>À bientôt !</p>
                            <br><br>
                            <p>L\'équipe du Tour du monde en 10 énigmes</p>
                            <br><br>
                            <img style="width: 100wv" src="http://89.234.183.207/letourdumonde/assets/images/mail3.png"></div>';
        $retour = mail($mail, $sujet, $message, $entete);

    }

}
?>