<?php

class Salles_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function recuptoutes() 
    {
        $query = $this->db->get('a_salle');
        return $query->result();
    }

}
?>