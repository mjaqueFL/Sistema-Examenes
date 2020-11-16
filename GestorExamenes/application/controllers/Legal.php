<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Dashboard
 */
class Legal extends CI_Controller
{
    /**
     * Constructor dashboard
     *
     * Se carga la libreria de google y se comprueba que el usuario está logueado para el acceso por URL
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('google'); /*Libreria de Google necesaria*/

    }

    public function index()
    {
    }

    function cookies()
    {
        $this->load->view('cookies');
    }

    function privacidad()
    {
        $this->load->view('privacidad');

    }

    function legal()
    {
        $this->load->view('avisolegal');
    }
}
