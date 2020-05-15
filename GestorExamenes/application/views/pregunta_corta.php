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
    <script src="<?php echo base_url(); ?>js/archivo.js"></script>

</head>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->

        <div class="sidebar-brand d-flex align-items-center justify-content-center">Gestor examenes</div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/GestorExamenes/index.php/Dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item -  Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-university"></i>
                <span>Banco preguntas</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item"
                       href="http://localhost/GestorExamenes/index.php/Banco_Preguntas/antesnuevapregunta">Añadir
                        nueva</a>

                    <a class="collapse-item" href="http://[::1]/savsoftquiz_v5-master/index.php/qbank">Lista
                        preguntas</a>
                </div>
            </div>
        </li>


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

                    <a class="collapse-item" href="http://[::1]/savsoftquiz_v5-master/index.php/quiz/add_new">Crear
                        examen</a>

                    <a class="collapse-item" href="http://[::1]/savsoftquiz_v5-master/index.php/quiz">Lista examenes</a>

                </div>
            </div>
        </li>
    </ul>
    <div class="container-fluid">

        <h3>Añadir pregunta corta</h3>


        <div class="row">
            <form method="post" id="qf" action="http://localhost/GestorExamenes/index.php/Banco_Preguntas/agregarpreguntacorta">

                <div class="col-md-8">
                    <br>
                    <div class="login-panel panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Seleccionar categoria</label>
                                <select class="form-control" name="categoria">

                                    <option value="1">1</option>

                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label for="inputEmail">Pregunta</label>
                                    <textarea name="question" class="form-control" id="question"></textarea>
                                </div>
            <!--                    <div class="form-group">
                                    <label for="inputEmail">Descripcion</label>
                                    <textarea name="description" class="form-control" id="description"
                                              style="visibility: hidden;"></textarea>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputEmail">Respuesta en una o dos palabras (no es case sensitive) </label>
                                    <br>
                                    <input type="text" name="answer" class="form-control" value="">
                                </div>
                                <button class="btn btn-default" type="submit">Enviar</button>


                            </div>
                        </div>


                    </div>
            </form>
        </div>


    </div>
</div>
