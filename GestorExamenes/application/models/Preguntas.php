<?php

class Preguntas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sacarexamenes()
    {
        $resultado = $this->mongo_db->select(['Titulo examen', 'Curso', 'Asignatura', 'Email'])->get(COLECCION);//preguntas es el nombre de la coleccion
        return $resultado;
    }

    public function sacarexamenconcreto($titulo)
    {
        $resultado = $this->mongo_db->where(['Titulo examen' => $titulo])->get(COLECCION);
        return $resultado;
    }

    //crear documento examen en mongo con Titulo, curso, asignatura, email , barajar
    public function crearexamen($examen)
    {
        $this->mongo_db->insert(COLECCION, $examen);

    }

    public function borrarexamenconcreto($examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->delete(COLECCION);
    }

    //modificar datos examen con AJAX
    public function modificardatos($data, $examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->set($data)->update(COLECCION);
        /*       $this->mongo_db->set(['Titulo examen' => $examen])->where(['Titulo examen' => $examen]);*/
        /*      return $this->mongo_db->where(['Titulo examen' => $data['Titulo examen']])->get('preguntas');*/
    }


    // crea el array preguntas en mongo
    public function editarexamen($examen, $datos)
    {
        var_dump($this->mongo_db->where('Titulo examen', $examen)->set($datos)->update(COLECCION));;

    }
}
