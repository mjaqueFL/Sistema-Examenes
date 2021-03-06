<!doctype html>
<html lang="en">
<head>
    <title>Confirmar borrado examen-Gestor Examenes</title>
</head>
<?php
include('templates/dashboard.php');
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
               href="<?php echo base_url() ?>Examenes/borrarexamen?examen=<?php echo $this->borrarexamen ?>">Borrar
                examen</a>
            <a class="btn btn-success" href="<?php echo base_url() ?>Examenes/listarexamenes">Volver a lista de
                examenes</a>
        </div>
    </div>
</div>
<?php
include 'templates/footer.php'
?>
<?php
include 'templates/comprobacionescookie.php'
?>
<?php
include 'templates/divcookie.php'
?>

</body>
</html>
