<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Dashboard
 */
class Dashboard extends CI_Controller
{
    /**
     * Dashboard constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $data['google_login_url'] = $this->google->get_login_url();
        if ($this->session->userdata('sess_logged_in') == 0) {
            $this->load->view('home',$data);
        } else {
            $this->load->view('dashboard');
        }
     }

    /**
     *
     */
    public function index()
    {

    }
}
