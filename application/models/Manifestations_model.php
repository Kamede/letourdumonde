<?php

class Manifestations_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function recuptoutes() 
    {
        $query = $this->db->get('manifestations');
        return $query->result();
    }

    public function par_page($p)
    {
        $query = $this->db->get('manifestations', 3, $p);
        return $query->result();
    }

}
?>