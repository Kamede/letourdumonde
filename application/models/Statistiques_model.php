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
        ");

        return $qq->result();

    }



}