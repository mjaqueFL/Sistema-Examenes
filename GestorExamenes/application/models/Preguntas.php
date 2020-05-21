<?php


class Preguntas extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function crearexamen($examen)
    {
        $this->mongo_db->insert('preguntas', $examen);
    }

    public function sacarpreguntas()
    {
        $resultado = $this->mongo_db->select(['tipo', 'categoria', 'pregunta', 'respuesta'])->get('preguntas');
        return $resultado;
    }

    public function sacarexamenes()
    {
        $resultado = $this->mongo_db->select(['Titulo examen', 'Curso', 'Asignatura', 'Email'])->get('preguntas');//preguntas es el nombre de la coleccion
        return $resultado;
    }

    public function sacarexamenconcreto($titulo)
    {
        $resultado = $this->mongo_db->where(['Curso' => $titulo])->get('preguntas');
        return $resultado;
    }

    public function datos($pregunta)
    {
        $this->mongo_db->insert('preguntas', $pregunta);

    }

    public function borrarexamenconcreto($examen)
    {
        $this->mongo_db->where(['Titulo examen' => $examen])->delete('preguntas');

    }

    public function modificardatos($data, $examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->set($data)->update('preguntas');
        /*       $this->mongo_db->set(['Titulo examen' => $examen])->where(['Titulo examen' => $examen]);*/
                return $this->mongo_db->where(['Titulo examen'=>$data['Titulo examen']])->get('preguntas');
    }

}
