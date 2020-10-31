<!DOCTYPE html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\head.php');
?>
<body id="instalacion" class="container-fluid">
<div >
    <form method="post" action="http://localhost/GestorExamenes/Instalacion/crearArchivo">
        <div class="form-group">
            <label for="NombreBD">Nombre de la base de datos</label>
            <input type="email" class="form-control" id="NombreBD" placeholder="Nombre de la base de datos">
        </div>
        <div class="form-group">
            <label for="Nombrecoleccion">Nombre de la coleccion</label>
            <input type="password" class="form-control" id="Nombrecoleccion" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>