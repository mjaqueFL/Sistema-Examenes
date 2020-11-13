<!doctype html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\headauth.php');
?>
<body>

<div id="wrapper" >
    <div class="container-fluid">
        <h2>Gestor Examenes</h2>
        <a class="btn btn-large">By:-Nacho</a>
        <div class="col s12 m6 offset-m3 l6 offset-l3">

            <?php
            if ($this->session->userdata('sess_logged_in') == 0) {
                ?>
                <a href="<?= $google_login_url ?>" class="waves-effect waves-light btn red"><span
                            class="fa fa-google left"></span>Haz click para hacer login con
                    GOOGLE</a><!--Redirige al autenticador de google-->
            <?php } else {
                ?>
                <a href="<?= base_url() ?>auth/logout" class="waves-effect waves-light btn red"><span
                            class="fa fa-google left"></span>Google logout</a>
            <?php }
            ?>

        </div>
    </div>
</div>
</body>
</html>