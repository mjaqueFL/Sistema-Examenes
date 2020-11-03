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

    public function sacarpreguntas($titulo)
    {
        $resultado = $this->mongo_db->where(['Titulo examen' => $titulo])->select(['preguntas'])->get('preguntas');
        return $resultado;
    }

    public function sacarexamenes()
    {
        $resultado = $this->mongo_db->select(['Titulo examen', 'Curso', 'Asignatura', 'Email'])->get('preguntas');//preguntas es el nombre de la coleccion
        return $resultado;
    }

    public function sacarexamenconcreto($titulo)
    {
        $resultado = $this->mongo_db->where(['Titulo examen' => $titulo])->get('preguntas');
        return $resultado;
    }

    //crear documento examen en mongo con Titulo, curso, asignatura, email , barajar
    public function datos($pregunta)
    {
        $this->mongo_db->insert('preguntas', $pregunta);

    }

    public function borrarexamenconcreto($examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->delete('preguntas');
    }

    //modificar datos examen con AJAX
    public function modificardatos($data, $examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->set($data)->update('preguntas');
        /*       $this->mongo_db->set(['Titulo examen' => $examen])->where(['Titulo examen' => $examen]);*/
        /*      return $this->mongo_db->where(['Titulo examen' => $data['Titulo examen']])->get('preguntas');*/
    }


    // crea el array preguntas en mongo
    public function editarexamen($examen, $datos)
    {
        /*         $this->mongo_db->where('Titulo examen', $examen)->set($datos, $this->mongo_db->concatArrays('preguntas'))->update('preguntas');*/
        // print_r($this->mongo_db->where('Titulo examen', $examen)->set($datos, concatArrays['preguntas'])->update('preguntas'));
        var_dump($this->mongo_db->where('Titulo examen', $examen)->set($datos)->update('preguntas'));
        /* $this->mongo_db->where('Titulo examen', $examen)->push(array('preguntas' => $datos))->update('preguntas');*/

    }

    /*prueba*/
    public function borrarpreguntaconcreta($examen, $id)
    {
        /* $this->mongo_db->where('Titulo examen', $examen)->set($datos, $last)->update('preguntas');*/
        var_dump($this->mongo_db->where('Titulo examen', $examen)->pop('preguntas', [$id])->update('preguntas'));

    }


}
