<?php

/**
 * Class Preguntas
 */
class Preguntas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Saca todos los examenes de la coleccion de la base de datos de Mongo
     * @return mixed
     * Retorna un objeto JSON por cada examen encontrado en la coleccion
     */
    public function sacarexamenes()
    {
        $resultado = $this->mongo_db->select(['Titulo examen', 'Curso', 'Asignatura', 'Email'])->get(COLECCION);//preguntas es el nombre de la coleccion
        return $resultado;
    }

    /**
     * Este método saca un examen en concreto de la coleccion de la base de datos de Mongo
     * @param $titulo
     * El método recibe el nombre del examen
     * @return mixed
     * El método devuelve el objeto JSON con el examen
     */
    public function sacarexamenconcreto($titulo)
    {
        $resultado = $this->mongo_db->where(['Titulo examen' => $titulo])->get(COLECCION);
        return $resultado;
    }

    /**
     * Método que sirve para crear el objeto JSON con el examen
     * @param $examen
     * El método recibe un array con el Título del examen, curso, asignatura, email y si está activada la opcion de barajar
     */
    public function crearexamen($examen)
    {
        $this->mongo_db->insert(COLECCION, $examen);

    }


    /**
     * Método que borra un examen en concreto
     * @param $examen
     * Recibe el nombre del examen
     */
    public function borrarexamenconcreto($examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->delete(COLECCION);
    }

    /**
     *
     * Método que modifica los datos de un examen concreto
     * @param $data
     * @param $examen
     * El método recibe los nuevos datos y el nombre del examen a modificar
     */
    public function modificardatos($data, $examen)
    {
        $this->mongo_db->where('Titulo examen', $examen)->set($data)->update(COLECCION);
        /*       $this->mongo_db->set(['Titulo examen' => $examen])->where(['Titulo examen' => $examen]);*/
        /*      return $this->mongo_db->where(['Titulo examen' => $data['Titulo examen']])->get('preguntas');*/
    }

    /**
     * Método que recibe las preguntas de un examen en concreto y las almacenas en un array
     * @param $examen
     * @param $datos
     * El método recibe las preguntas del examen y el nombre del examen en concreto a modificar
     */
    public function editarexamen($examen, $datos)
    {
        $this->mongo_db->where('Titulo examen', $examen)->set($datos)->update(COLECCION);

    }
}
