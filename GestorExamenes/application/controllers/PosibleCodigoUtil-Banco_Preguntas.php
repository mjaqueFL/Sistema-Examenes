<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES
class Banco_Preguntas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Preguntas');
    }

    public function index()
    {

    }
    public function antesnuevapregunta()
    {
        $this->load->view('antes_nueva_pregunta');
    }

    public function nuevapreguntacorta()
    {
        $this->load->view('pregunta_corta');
    }

    public function agregarpreguntacorta()
    {
        $pregunta = array(
            'categoria' => $this->input->post('categoria'),
            'tipo'=>'pregunta corta',
            'pregunta' => $this->input->post('question'),
            'respuesta' =>$this->input->post('answer'),
        );

        $this->Preguntas->datos($pregunta);
        redirect("http://localhost/GestorExamenes/Dashboard");
    }

    public function listarpreguntas()
    {
        $this->load->view('lista_preguntas');

    }

    public function sacarpreguntas()
    {
        $preguntas = $this->Preguntas->sacarpreguntas();
/*       print_r($preguntas);*/
 /*       foreach ($preguntas as $pregunta) {
            echo $pregunta['pregunta'];
        }*/
        if (empty($preguntas)) {
            echo 'No hay prerguntas ';
            echo '<br>';
         /*   echo "<a href=" . base_url() . ">Volver al indice</a>";*/
        } else {
            $this->mispreguntas = $preguntas;
/*            $clases = $this->AlumnosBD->sacarclases();
            $this->misclases = array();
            foreach ($clases as $clase) {
                $this->misclases[$clase['idClase']] = $clase["nombre"];
            }
            $this->load->view('listar_alumnos');*/
/*            print_r($this->mispreguntas);*/
        }
        $this->load->view('lista_preguntas');
    }
}
