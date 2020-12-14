<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Legal
 */
class Legal extends CI_Controller
{
    /**
     * Legal constructor.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('google'); /*Libreria de Google necesaria*/
    }

    /**
     *
     */
    public function index()
    {
    }

    /**
     * Carga la página de la política de cookies
     */
    function cookies()
    {
        $this->load->view('cookies');
    }

    /**
     * Carga la política de privacidad
     */
    function privacidad()
    {
        $this->load->view('privacidad');

    }

    /**
     * Carga el aviso legal
     */
    function legal()
    {
        $this->load->view('avisolegal');
    }
}
