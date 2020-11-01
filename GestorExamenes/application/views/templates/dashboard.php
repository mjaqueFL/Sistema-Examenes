<?php

include('C:\xampp\htdocs\GestorExamenes\application\views\templates\head.php');

?>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->

        <div class="sidebar-brand d-flex align-items-center justify-content-center">Gestor examenes</div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/GestorExamenes/Dashboard/">
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

                    <a class="collapse-item" href="http://localhost/GestorExamenes/Examenes/">Crear examen</a>

                    <a class="collapse-item" href="http://localhost/GestorExamenes/Examenes/listarexamenes">Lista
                        examenes</a>

                </div>
            </div>
        </li>
        <?php if (isset($_SESSION['name'])) { ?>
            <div class="col s12 m6 l4 offset-l3 ">
                <div class="card ">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class=" img img-fluid" src="<?= $_SESSION['profile_pic'] ?>" alt="imagencuenta">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"> <span
                                  class="material-icons"><p class="text-center"><?= $_SESSION['name'] ?></p></span></span>
                    </div>
                    <a href="<?= base_url()?>auth/logout" class="waves-effect waves-light btn red"><span
                                class="fa fa-google left"></span>Google logout</a>
                    <!--                    <div class="card-reveal">
                        <p class="lead text-justify"><? /*= $_SESSION['email'] */ ?></p>
                        <span class="card-title grey-text text-darken-4"><? /*= $_SESSION['name'] */ ?><i
                                    class="material-icons right"></i></span>
                    </div>-->
                </div>
            </div>
        <?php } ?>
    </ul>
