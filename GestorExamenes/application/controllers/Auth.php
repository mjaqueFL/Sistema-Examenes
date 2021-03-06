<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Auth
 */
class Auth extends CI_Controller
{

    /**
     * Constructor Login Auth
     *
     * Cuando el usuario entra en esta clase el programa verifica si ya ha iniciado sesion y
     * si no te redirige a la vista para iniciar sesion
     *
     *
     */
    function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $this->comprobacion();
    }

    /**
     * Eliminacion proceso instalacion
     *
     * Al ser el controlador por defecto cuando se acaba el proceso de instalacion, aqui se eliminan los archivos de instalacion si existieran
     */
    public function index()
    {
        if (file_exists(APPPATH . 'controllers\Instalacion.php'))
            unlink(APPPATH . 'controllers\Instalacion.php');
        if (file_exists(APPPATH . 'views\instalacion.php')) {
            unlink(APPPATH . 'views\instalacion.php');

        }
    }


    /**
     * Inicializa los datos del usuario de Google
     *
     * Despues de iniciar sesion te redirige a este método, donde se crean los datos, este metodo se tiene que especificar tanto
     * en /config/google_config.php como en https://console.developers.google.com/
     */
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
        $data['google_login_url'] = $this->google->get_login_url();
        redirect('Dashboard', $data);
    }


    /**
     * Logout del usuario
     *
     * Se invoca este método cuando se va a cerrar sesion, elimina todos los datos de sesion del usuario
     */
    public function logout()
    {
        $this->google->revoke_token();
        $this->session->unset_userdata('session_data');
        $this->session->sess_destroy();
        $data['google_login_url'] = $this->google->get_login_url();
        redirect(base_url());
    }

    public function comprobacion()
    {
        $data['google_login_url'] = $this->google->get_login_url();
        if ($this->session->userdata('sess_logged_in') == 1) {
            $this->load->view('templates/dashboard');
        } else {
            $this->load->view('home', $data);
        }
    }

}
