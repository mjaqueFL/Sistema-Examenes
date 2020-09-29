<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES
class Comprobacion_Acceso extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('google');
        /*la funcion por defecto recordaba la sesion y solo se podia loguear con una misma cuenta*/
        $this->google->revoke_token();
        $this->session->unset_userdata('session_data');
        $this->session->sess_destroy();
        $data['google_login_url'] = $this->google->get_login_url();
        redirect(base_url());
    }

    public function index()
    {

    }
}
