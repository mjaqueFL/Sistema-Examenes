<!doctype html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\head.php');
?>
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\dashboard.php');
?>
<body>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="alert alert-danger">
                Se va a proceder a borrar el examen, haga click en "Borrar examen" si quiere borrar el examen o haga
                click en "Volver a lista de examenes" ,si quiere volver a la lista de examenes
            </div>
            <a class="btn btn-danger"
               href="http://localhost/GestorExamenes/Examenes/borrarexamen?examen=<?php echo $this->borrarexamen ?>">Borrar
                examen</a>
            <a class="btn btn-success" href="http://localhost/GestorExamenes/listarexamenes">Volver a lista de
                examenes</a>
        </div>
    </div>
</div>
</body>
</html>
