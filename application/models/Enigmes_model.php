<?php
class Enigmes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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


    /*public function dialogue($nb_enigme){

        $this->recuptoutes();

        $enigme = array
        (
            "number" => $nb_enigme,
            "background" => $background,
            "dialogue"=> $dialogue,
        );
        echo json_encode($enigme);
    }*/

}
?>