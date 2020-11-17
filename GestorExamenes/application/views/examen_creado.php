<!doctype html>
<html lang="en">
<?php
include('templates/dashboard.php');
?>
<body>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="alert alert-success">Examen creado de manera satisfactoria. Ahora añade algunas
                preguntas al examen
            </div>
            <a href="<?php echo base_url() ?>Examenes/listarexamenes"
               class="btn btn-danger">Abrir lista de examenes</a>
            <a class="btn btn-success" href="<?php echo base_url() ?>Dashboard">Volver al
                dashboard</a>
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

</div>
</body>
</html>
