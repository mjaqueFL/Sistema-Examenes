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
       echo $nombreexamen = $this->input->get('examen');
        echo $jsonrecibido = $this->input->get('examengenerado');
        $preguntas = json_decode($jsonrecibido, true);
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
            'Titulo examen' => $this->input->post('tituloexamen'),
            'Curso' => $this->input->post('curso'),
            'Asignatura' => $this->input->post('asignatura'),
            'Email' => $this->input->post('email'),
        ];
        $this->Preguntas->modificardatos($data,$_GET['nombreexamen']);

        $examen=$this->Preguntas->sacarexamenconcreto($this->input->post('tituloexamen'));

        $examen = json_decode(json_encode($examen), true);
        $this->miexamenconcreto= $examen;
        /*   return $examen = json_decode(json_encode($examen), true);*/

        /*        $this->load->view('estructura2');*/

        /* $this->load->view('estructura2');*/
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
            'Titulo examen' => $this->input->post('tituloexamen'),
            'Curso' => $this->input->post('tituloexamen'),
            'Asignatura' => $this->input->post('asignatura'),
            'Email' => $this->input->post('email'),
            'Barajar' => $barajar,
        );
        $this->Preguntas->datos($examen);
        redirect("http://localhost/GestorExamenes/Examenes/examencreado");
    }

    /**
     * Se carga una vista que muestra un mensaje de exito al crear la pregunta
     */
    public function examencreado()
    {
        $this->load->view('examen_creado');
    }

    /**
     *
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
        redirect("http://localhost/GestorExamenes/Examenes/listarexamenes");

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
        $this->miexamenconcreto= $examen;
        $this->load->view('estructura2');
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
           redirect(Auth::class);
        }
    }
}
