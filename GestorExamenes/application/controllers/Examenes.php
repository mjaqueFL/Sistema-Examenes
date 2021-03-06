<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES

/**
 * Class Examenes
 */
class Examenes extends CI_Controller
{

    /**
     * Examenes constructor.
     *
     * Se carga la libreria de Google, el modelo preguntas y se comprueba si el usuario está logueado
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $this->load->model('Preguntas');
        $this->comprobacion();

    }

    /**
     * Se carga la vista alta examen
     */
    public function index()
    {
        $this->load->view('alta_examen');
    }
// metodo que recibe las preguntas del examen

    /**
     * Método que recibe el examen del formulario y el examen que se va a modificar
     *  Nombreexamen recibe el nombre del examen y examengenerado es el examen en formato json que se recibe del formulario
     */
    public function modificardatos()
    {
        $nombreexamen = $this->input->get('examen');
        $data = strip_tags($this->input->post('data'));
        $preguntas = json_decode($data, true);
        $this->Preguntas->editarexamen($nombreexamen, $preguntas);
    }

    /**
     * Se cambian los datos del examen con AJAX
     *
     * Se reciben los datos del examen y se cambian mediante una peticion AJAX
     *
     */
    public function modificarajax()
    {
        $data = [
            'Titulo examen' => strip_tags($this->input->post('tituloexamen')),
            'Curso' => strip_tags($this->input->post('curso')),
            'Asignatura' => strip_tags($this->input->post('asignatura')),
            'Email' => strip_tags($this->input->post('email')),
        ];
        $this->Preguntas->modificardatos($data, $_GET['nombreexamen']);

    }

    /**
     * Método para crear el examen
     *
     * Se reciben todos los datos necesarios para la creacion del examen y se crea mediante una consulta a mongodb
     *
     */
    public function crearexamen()
    {
        if ($this->input->post('barajar') === "True") {
            $barajar = true;
        } else {
            $barajar = false;
        }
        $examen = array(
            'Titulo examen' => strip_tags($this->input->post('tituloexamen')),
            'Curso' => strip_tags($this->input->post('curso')),
            'Asignatura' => strip_tags($this->input->post('asignatura')),
            'Email' => strip_tags($this->input->post('email')),
            'Barajar' => $barajar,
        );
        $this->Preguntas->crearexamen($examen);
        redirect(base_url() . 'Examenes/examencreado');
    }

    /**
     * Se carga una vista que muestra un mensaje de exito al crear la pregunta
     */
    public function examencreado()
    {
        $this->load->view('examen_creado');
    }

    /**
     * Muestra los examenes de la base de datos con la coleccion especificada en el proceso de instalacion
     */
    public function listarexamenes()
    {

        $examenes = $this->Preguntas->sacarexamenes();
        $this->misexamenes = $examenes;
        $this->load->view('lista_examenes');
    }

    /**
     * Carga vista comprobacion borrado
     *
     * El metodo recoge el examen seleccionado para borrar
     */
    public function antesborrar()
    {
        $recoger = $this->input->get('examen');
        $this->borrarexamen = $recoger;
        $this->load->view('confirmar_borrado');
    }

    /**
     * Borrado de examen
     *
     * El metodo recoge el nombre del examen y ejecuta el metodo de borrado en el modelo preguntas
     */
    public function borrarexamen()
    {
        $recoger = $this->input->get('examen');
        $this->Preguntas->borrarexamenconcreto($recoger);
        $this->borrado = true;
        $examenes = $this->Preguntas->sacarexamenes();

        $this->misexamenes = $examenes;
        $this->load->view("lista_examenes");

    }


    /**
     * Carga examen elegido en listar exaemenes
     *
     * Este metodo muestra los datos del examen elegido en listar examenes y preguntas si las tuviera
     */
    public function crearpreguntas()
    {
        $recoger = $this->input->get('examen');
        $examen = $this->Preguntas->sacarexamenconcreto($recoger);
        //si mandamos el array completo tal y como lo cogemos de la BBDD, la estructura de las preguntas es std object, no podemos acceder a los datos si no es un array
        $examen = json_decode(json_encode($examen), true);
        $this->miexamenconcreto = $examen;
        if (empty($this->miexamenconcreto)) {
            $this->load->view('mensaje_error');
            /*exit(0);*/
        } else {
            $this->load->view('modificar_examen');
        }


    }

    /**
     * Se comprueba el login del usuario
     *
     * Si el usuario no está logueado se redirige al controlador Auth, si está logueado el usuario se mantiene en la página
     */
    public function comprobacion()
    { //Codeigniter no deja extender de varias clases y al crear objeto no salen los metodos de la otra clase, asi que repetiré este metodo comprobacion en todos los sitios ¯\_(ツ)_/¯
        $data['google_login_url'] = $this->google->get_login_url();
        if (file_exists(APPPATH . 'controllers\Instalacion.php')) {
            redirect(Instalacion::class);
        } else {
            if ($this->session->userdata('sess_logged_in') == 0) {
                redirect(Auth::class);
            }
        }
    }

}
