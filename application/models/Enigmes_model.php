<?php
class Enigmes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function verifblocage(){
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
    }
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
        $moment_futur=$moment_present+3;

        $query=$this->db->get_where('user', array('user_pseudo' =>$_SESSION['pseudo']));
        $verif=$query->result_array();

        if ($verif[0]['user_nb_erreur_actuel']==2){
            $data=array(
                'user_nb_erreur_actuel'=>$verif[0]['user_nb_erreur_actuel']+1,
                'user_nb_erreur'=>$verif[0]['user_nb_erreur']+1,
                'user_heure_blocage'=>$moment_futur,
                'user_etat'=>1
            );
            $_SESSION['blocage']='bloque';
        }else{
            $data=array(
                'user_nb_erreur_actuel'=>$verif[0]['user_nb_erreur_actuel']+1,
                'user_nb_erreur'=>$verif[0]['user_nb_erreur']+1,
        );
        }
        $this->db->where('user_pseudo', $_SESSION['pseudo']);
        $this->db->update('user', $data);


    }
    /*public function blocage(){
        $query =$this->db->get_where('user', array('user_pseudo' => $_SESSION['pseudo']));
        $data=''
        echo date("H:i");
    }*/
}
?>