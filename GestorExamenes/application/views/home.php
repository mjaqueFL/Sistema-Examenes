<!doctype html>
<html lang="en">
<head>
    <title>Login Gestor Examenes</title>
</head>
<?php
include('templates/headauth.php');
?>
<body id="bodyauth" class="text-center">
<form  class=" border form-signin">
    <img class="img img-fluid mb-4" src="<?php echo base_url() ?>imagenes/iconologin.png" alt=""/>
    <h1 class="h3 mb-3 font-weight-bold">GESTOR EXAMENES</h1>
    <a  href="<?= $google_login_url ?>" class="waves-effect waves-light btn red"><span class="fa fa-google left fa-2x"></span>LOGIN
        GOOGLE</a><!--Redirige al autenticador de google-->
    <p class="mt-5 mb-3 font-weight-bold ">By:-Nacho</p>
</form>


</body>
</html>