<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $data['google_login_url'] = $this->google->get_login_url();
        if ($this->session->userdata('sess_logged_in') == 1) {
            redirect('Dashboard');
/*            $this->load->view('ejemplo');*/
        } else {

            $this->load->view('home', $data);
        }


    }

    public function index()
    {
    }

    public function oauth2callback()
    {
        /*datos sesion*/
        $google_data = $this->google->validate();
        $session_data = array(
            'name' => $google_data['name'],
            'email' => $google_data['email'],
            'source' => 'google',
            'profile_pic' => $google_data['profile_pic'],
            'link' => $google_data['link'],
            'sess_logged_in' => 1
        );

        $this->session->set_userdata($session_data);
        /*        print_r($google_data);
                die();*/

        $data['google_login_url'] = $this->google->get_login_url();
        /*        $this->load->view('home', $data);*/
        redirect('Dashboard', $data);
        /*$this->load->controller('Dashboard');*/

    }

    public function logout()
    {
        /*la funcion por defecto recordaba la sesion y solo se podia loguear con una misma cuenta*/
        $this->google->revoke_token();
        $this->session->unset_userdata('session_data');
        $this->session->sess_destroy();
        $data['google_login_url'] = $this->google->get_login_url();
        redirect(base_url());
    }
}
