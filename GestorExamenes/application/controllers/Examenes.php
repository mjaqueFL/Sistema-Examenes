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

    public function crearexamen()
    {
        $examen = array(
            'Titulo examen' => $this->input->post('tituloexamen'),
            'Curso' => $this->input->post('tituloexamen'),
            'Asignatura' => $this->input->post('asignatura'),
            'Email' => $this->input->post('email'),
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
        $this->miexamenconcreto = $examen;
        $this->load->view('crear_preguntas');
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
}
