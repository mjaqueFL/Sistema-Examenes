<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES
class Examenes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Preguntas');
    }

    public function index()
    {
        $this->load->view('alta_examen');
    }
// metodo que recibe las preguntas del examen
    public function modificardatos()
    {
       echo $nombreexamen = $this->input->get('examen');
        echo $jsonrecibido = $this->input->get('j');
        $preguntas = json_decode($jsonrecibido, true);
        $this->Preguntas->editarexamen($nombreexamen, $preguntas);
    }

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

    public function examencreado()
    {
        $this->load->view('examen_creado');
    }

    public function crearpreguntas()
    {
        $recoger = $this->input->get('examen');
        $examen = $this->Preguntas->sacarexamenconcreto($recoger);
        //si mandamos el array completo tal y como lo cogemos de la BBDD, la estructura de las preguntas es std object, no podemos acceder a los datos si no es un array
       $examen = json_decode(json_encode($examen), true);
        $this->miexamenconcreto= $examen;
        $this->load->view('estructura2');
    }

    public function listarexamenes()
    {

        $examenes = $this->Preguntas->sacarexamenes();
        $this->misexamenes = $examenes;
        $this->load->view('lista_examenes');


    }
    public function antesborrar()
    {
        $recoger = $this->input->get('examen');
        $this->borrarexamen = $recoger;
        $this->load->view('confirmar_borrado');
    }

    public function borrarexamen()
    {
        $recoger = $this->input->get('examen');
        $this->Preguntas->borrarexamenconcreto($recoger);
        redirect("http://localhost/GestorExamenes/Examenes/listarexamenes");

    }

    public function borrarpregunta()
    {
        echo $posicion = $this->input->get('posicion');
        echo $examen = $this->input->get('examen');
        $this->Preguntas->borrarpreguntaconcreta($examen,$posicion);

    }

    /*public function ejemplo()
    {
             $miArray = array(1,4,6,8,3,34.8,9,43);
             print_r(json_encode($miArray));
             $miArray = array("manzana"=>"verde", "uva"=>"Morada", "fresa"=>"roja");
             print_r(json_encode($miArray));
        $examenes = $this->Preguntas->sacarexamenes();
        print_r(json_encode($examenes));

    }*/
}
