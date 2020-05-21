<html>
<head>
    <title>Prueba de autentificacion de Codeigniter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
    <meta name="author" content="Ignacio Lorenzo Vélez 2ºDAW PROYECTO SISTEMA GESTION EXAMENES">
</head>
<body>

<div align="center">
    <h2>Prueba login cuenta Google CodeIgniter</h2>
</div>
<div class="container">
    <div class="row">
        <a class="waves-effect waves-light btn-large">By:-Nacho</a>
        <div class="col s12 m6 offset-m3 l6 offset-l3">

            <?php
            if ($this->session->userdata('sess_logged_in') == 0) {
                ?>
                <a href="<?= $google_login_url ?>" class="waves-effect waves-light btn red"><i
                            class="fa fa-google left"></i>Google login</a><!--Redirige al autenticador de google-->
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