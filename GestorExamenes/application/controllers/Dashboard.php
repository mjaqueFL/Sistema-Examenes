<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Dashboard
 */
class Dashboard extends CI_Controller
{
    /**
     * Constructor dashboard
     *
     * Se carga la libreria de google y se comprueba que el usuario está logueado para el acceso por URL
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $this->comprobacion();
    }

    /**
     * Se carga la vista dashboard
     */
    public function index()
    {
        $this->load->view('templates/dashboard');
    }


    /**
     * Se comprueba el login del usuario
     *
     * Si el usuario no está logueado se redirige al controlador Auth, si está logueado el usuario se mantiene en la página
     */
    public function comprobacion()
    { //Codeigniter no deja extender de varias clases y al crear objeto no salen los metodos de la otra clase, asi que repetiré este metodo comprobacion en todos los sitios ¯\_(ツ)_/¯
        $data['google_login_url'] = $this->google->get_login_url();
        if ($this->session->userdata('sess_logged_in') == 0) {
            if (file_exists("C:\\xampp\htdocs\\GestorExamenes\\application\controllers\\Instalacion.php")) {
                redirect(Instalacion::class);
            } else
                redirect(Auth::class);
        }
    }
}
