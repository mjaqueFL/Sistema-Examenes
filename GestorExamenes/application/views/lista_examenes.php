<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplicacion Code igniter</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/archivo2.js"></script>

</head>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->

        <div class="sidebar-brand d-flex align-items-center justify-content-center">Gestor examenes</div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/GestorExamenes/Dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuiz"
               aria-expanded="true"
               aria-controls="collapseQuiz">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
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
    </ul>
    <div class="container-fluid">
        <div class="container">
            <h3>Lista examenes</h3>
            <div class="row">

                <div class="col-md-12">
                    <br>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Titulo examen</th>
                            <th>Curso</th>
                            <th>Asignatura</th>
                            <th>Accion</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($this->misexamenes as $valor) {
                                echo '<tr>';
                                echo '<td>' . $valor['Titulo examen'] . '</td>';
                                echo '<td>' . $valor['Curso'] . '</td>';
                                echo '<td>' . $valor['Asignatura'] . '</td>';
                                ?>
                                <td>
                                    <a href="http://localhost/GestorExamenes/Examenes/crearpreguntas?examen=<?php echo $valor["Titulo examen"] ?>"><img
                                                src="<?php echo base_url('imagenes/edit.png'); ?>"></a>
          <!--                          <a href="http://localhost/GestorExamenes/Examenes/listarpreguntasexamen?examen=<?php /*echo $valor["Titulo examen"] */?>"><img
                                                src="<?php /*echo base_url('imagenes/edit.png'); */?>"></a>-->
                                    <a href="http://localhost/GestorExamenes/Examenes/antesborrar?examen=<?php echo $valor["Titulo examen"] ?>"><img
                                                src="<?php echo base_url('imagenes/cross.png'); ?>"></a>
                                </td>
                                <?php
                                echo '<br>';
                                echo '</tr>';
                            }

                            ?>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            <br><br><br><br>

        </div>

    </div>
