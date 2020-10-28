<!doctype html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\head.php');
?>
<body>
<div align="center">
    <h2>Gestor Examenes</h2>
</div>
<div class="container">
    <div class="row">
        <a class="btn btn-large">By:-Nacho</a>
        <div class="col s12 m6 offset-m3 l6 offset-l3">

            <?php
            if ($this->session->userdata('sess_logged_in') == 0) {
                ?>
                <a href="<?= $google_login_url ?>" class="waves-effect waves-light btn red"><i
                            class="fa fa-google left"></i>Haz click para hacer login con
                    GOOGLE</a><!--Redirige al autenticador de google-->
            <?php } else {
                ?>
                <a href="<?= base_url() ?>auth/logout" class="waves-effect waves-light btn red"><i
                            class="fa fa-google left"></i>Google logout</a>
            <?php }
            ?>

        </div>
    </div>
</div>

</body>
</html>