<!doctype html>
<html lang="en">
<head>
    <title>ERROR</title>
</head>
<?php
include('templates/dashboard.php');
?>
<body>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="alert alert-danger">
              Su examen está corrupto, por favor cree otro examen
            </div>
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
