<?php
class Statistiques_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function recupstat()
    {
        $qq = $this->db->query("
        SELECT
        *
        FROM resoudre
        INNER JOIN user ON user.user_id = resoudre._user_id
        WHERE _enigme_id=10
        ORDER BY res_final DESC 
        ");

        return $qq->result();

    }

    public function recupunstat(){
        $id=$_SESSION['user_id'];
        $query = $this->db->query("
        SELECT
        *
        FROM resoudre
        WHERE _user_id=".$id
        );

        return $query->result();
    }



}