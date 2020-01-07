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

        if (isset($_SESSION['co_gestion'])){
            $this->load->view("gestion_view");
        }else{

            $this->load->view("co_gestion_view");
        }


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

        if (isset($_SESSION['co_gestion'])){
            $this->load->view('GestionAffiche2_view',$output);

        }else{
            $this->load->view("co_gestion_view");
        }



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

        if (isset($_SESSION['co_gestion'])){
            $this->load->view('GestionAffiche_view',$output);
        }else{
            $this->load->view("co_gestion_view");
        }

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


        if (isset($_SESSION['co_gestion'])){
            $this->load->view('GestionAffiche_view',$output);
        }else{
            $this->load->view("co_gestion_view");
        }

    }

    public function convertir($jours,$heures,$minutes,$secondes){
        $this->load->model('Gestion_model');//Charger le modèle
        $this->Gestion_model->convertirmodel($jours,$heures,$minutes,$secondes);
        //$this->load->view("convertir_view"); // Vue + envoyer les manifs

    }

    public function connexion(){
        $id=$this->input->post('id');
        $mdp=$this->input->post('mdp');

        if($id=='admin'&&$mdp=='ADMIN487141'){
            $_SESSION['co_gestion']=true;
            redirect(base_url().'Gestion');
        }else{
            $_SESSION['erreur']='Erreur lors de l\'entrée des informations.';
            redirect(base_url().'Gestion');
        }
    }

    public function deconnexion (){
        unset($_SESSION['co_gestion']);
        redirect(base_url());
    }

}