<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Instalacion
 */

class Instalacion extends CI_Controller
{
    /**
     * Instalacion constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Carga la vista instalacion
     */
    public function index()
    {

        $this->load->view('instalacion');
    }

    /**
     * Crea archivo de configuracion mongodb
     *
     * El metodo recibe el nombre de la base de datos y el nombre de la coleccion, si
     * se intenta acceder al metodo se genera una base de datos con un nombre por defecto
     */
    public function crearArchivo()
    {
        $basedatos = $this->input->post("nombrebd");
        $coleccion=$this->input->post("nombrecol");
        if (empty($basedatos)) {
            $basedatos = "basedatosdefault";
        } // si un listo entra en el metodo se genera una por defecto
        $basedatos = '"' . $basedatos . '"';
        $coleccion = '"' . $coleccion . '"';
        $myfile = fopen("testfile.php", "w");
        $texto = '<?php';
        fwrite($myfile, $texto);
        fwrite($myfile, "\n"); //si no se hace este salto de linea da fallos, en el resto de lineas es irrelevante
        $texto = '$config["mongo_db"]["active"] = "default";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["no_auth"] = true;';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["hostname"] = "localhost";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["port"] = "27017";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["username"] ="";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["password"] ="";';
        fwrite($myfile, $texto);
        /*   $texto= '$config["mongo_db"]["default"]["database"] ='."$_POST.['hola'].";*/
        $texto = '$config["mongo_db"]["default"]["database"] =' . $basedatos . ";";
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["db_debug"] = TRUE;';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["return_as"] = "array";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["write_concerns"] = (int)1;';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["journal"] = TRUE;';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["read_preference"] = "primary";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["read_concern"] = "local";';
        fwrite($myfile, $texto);
        $texto = '$config["mongo_db"]["default"]["legacy_support"] = TRUE;';
        fwrite($myfile, $texto);
        fclose($myfile);
        rename('testfile.php', 'C:\xampp\htdocs\GestorExamenes\application\config\mongo_db.php');
        $archivoroutes = fopen("C:\\xampp\htdocs\\GestorExamenes\\application\config\\routes.php", "a+");
        $texto = '$route["default_controller"] = "Auth";';
        fwrite($archivoroutes, "\n");
        fwrite($archivoroutes, $texto);
        fclose($archivoroutes);
        $modelo = fopen("C:\\xampp\htdocs\\GestorExamenes\\application\models\\Preguntas.php","a+");
        $texto = 'define("NOMBRECOLECCION",' . $coleccion . ')';
        fwrite($modelo, $texto);
        fclose($modelo);
        redirect("Auth");

    }
}