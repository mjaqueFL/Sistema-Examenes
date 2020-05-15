<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
/*        $this->load->library('google');
      if ($this->session->userdata('sess_logged_in') == 0) { //si no estás logueado no te
            // deja acceder a este archivo, así vamos a comprobar los accesos a los controladores, comentar esta linea y comprobar que si puedes entrar sin estar logueado
            echo 'Mal';
        } else {
            echo 'bien';
        }*/
    }

    public function index()
    {
       $this->load->view('dashboard');
    }

}
