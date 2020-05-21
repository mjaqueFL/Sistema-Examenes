<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modificar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Preguntas');
        $this->load->helper('url');

    }

    public function modificar()
    {

        $data = [
            'Titulo examen' => $this->input->post('tituloexamen'),
            'Curso' => $this->input->post('curso'),
            'Asignatura' => $this->input->post('asignatura'),
            'Email' => $this->input->post('email'),
        ];

       $datos=$this->Preguntas->modificardatos($data,$_GET['examen']);
        $this->load->view('crear_preguntas');
    }
}

