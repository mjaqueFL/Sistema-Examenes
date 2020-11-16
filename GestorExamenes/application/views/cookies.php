<?php
require_once('templates/head.php');
?>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->

        <div class="sidebar-brand d-flex align-items-center justify-content-center">Gestor examenes</div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Dashboard">
                <span class="fas fa-fw fa-tachometer-alt"></span>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuiz"
               aria-expanded="true"
               aria-controls="collapseQuiz">
                <span class="fas fa-fw fa-chalkboard-teacher"></span>
                <span>Examenes </span>
            </a>
            <div id="collapseQuiz" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="<?php echo base_url() ?>Examenes/"><img
                                class="imgcrearexamen" src="/GestorExamenes/imagenes/examen.svg"
                                alt="imagenaltaexamen"/>Crear examen</a>

                    <a class="collapse-item" href="<?php echo base_url() ?>Examenes/listarexamenes"><img
                                class="imgcrearexamen" src="/GestorExamenes/imagenes/listaexamen.svg"
                                alt="imagenlistaexamen"/>Lista examenes</a>

                </div>
            </div>
        </li>
        <?php if (isset($_SESSION['name'])) { ?>
            <div class="col s12 m6 l4 offset-l3 ">
                <div class="card ">
                    <div class="card-content">
                        <?php
                        if (http_response_code(403)) {
                            ?>
                            <span class="p-2 fa-user fas fa-lg"></span>
                            <?php
                        } else {
                            ?>
                            <img class=" img img-fluid" src="<?= $_SESSION['profile_pic'] ?>" alt="imagencuenta">
                            <?php
                        }
                        ?>
                        <p class="text-center"><?= $_SESSION['name'] ?>

                        </p>
                    </div>
                    <a href="<?= base_url() ?>auth/logout" class="btn btn-info"><span
                                class="float-left fas fa-sign-out-alt"></span>Google logout</a>
                </div>
            </div>
        <?php } ?>
    </ul>
    <?php
    include('templates/footer.php');
    ?>
