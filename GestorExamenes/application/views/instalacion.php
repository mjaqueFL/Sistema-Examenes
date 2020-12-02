<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proceso instalación Gestor Examenes</title>
</head>
<?php
include('templates/head.php');
?>

<body id="instalacion" class="container-fluid">
<div >
    <h1 class="display-4">Proceso Instalación Gestion Exámenes</h1>

    <form method="post" action=<?php echo base_url() ?>Instalacion/crearArchivo>
        <div class="form-group">
            <label for="NombreBD">Nombre de la base de datos</label>
            <input name="nombrebd" required type="text" class="form-control" id="NombreBD" placeholder="Nombre de la base de datos">
        </div>
        <div class="form-group">
            <label for="Nombrecoleccion">Nombre de la coleccion</label>
            <input name="nombrecol" required type="text" class="form-control" id="Nombrecoleccion" placeholder="Nombrecoleccion">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>