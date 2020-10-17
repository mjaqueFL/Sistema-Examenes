<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modificar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Preguntas');
        $this->load->helper('url');

    }
    //Modificar datos examen con AJAX
    public function modificar()
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

}
