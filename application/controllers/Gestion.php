<?php

Class Gestion extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');

        /*if(!isset($_SESSION['ident'])){
            redirect(base_url().'login');
        }*/

    }

    public function index(){
        //$this->load->view("Header_2_view");
        $this->load->view("gestion_view");
    }

    public function user(){
        $crud=new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('user');
        $crud->set_subject('un utilisateur');
        $crud->unset_clone();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_export();
        $output=$crud->render();
        $this->load->view('GestionAffiche2_view',$output);
    }

    public function enigme(){
        $crud=new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('enigme');
        $crud->set_subject('une enigme');
        $crud->unset_clone();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_export();
        $output=$crud->render();
        $this->load->view('GestionAffiche_view',$output);
    }
    public function cle(){
        $crud=new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('cle');
        $crud->set_subject('une clé d\'activation');
        $crud->unset_clone();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_export();
        $output=$crud->render();
        $this->load->view('GestionAffiche_view',$output);
    }

    public function convertir($jours,$heures,$minutes,$secondes){
        $this->load->model('Gestion_model');//Charger le modèle
        $this->Gestion_model->convertirmodel($jours,$heures,$minutes,$secondes);
        //$this->load->view("convertir_view"); // Vue + envoyer les manifs

    }

}