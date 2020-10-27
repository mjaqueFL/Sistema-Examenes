<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instalacion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('instalacion');
    }

    public function crearArchivo()
    {
        $basedatos = $this->input->post("nombrebd");
        if (empty($basedatos)) {
            $basedatos = "basedatosdefault";
        } // si un listo entra en el metodo se genera una por defecto
        $basedatos = '"' . $basedatos . '"';
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
        $archivoroutes = fopen("C:\\xampp\htdocs\\GestorExamenes\\application\config\\routes.php", "a++");
        $texto = '$route["default_controller"] = "Auth";';
        fwrite($archivoroutes, "\n");
        fwrite($archivoroutes, $texto);
        fclose($archivoroutes);
        /*      unlink('prueba.html');*/
        redirect("Auth");

    }
}