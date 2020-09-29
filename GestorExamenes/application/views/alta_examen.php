<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplicacion Code igniter</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
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
    <script src="http://localhost/GestorExamenes/js/archivo.js"></script>

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
        <h3>Alta examen</h3>


        <div class="row">
            <form method="post" action="http://localhost/GestorExamenes/Examenes/crearexamen">

                <div class="col-md-12">
                    <br>
                    <div  class="login-panel panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" name="tituloexamen" class="form-control" placeholder="Titulo examen"
                                       required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="curso" class="form-control" placeholder="Curso">
                            </div>
                            <div class="form-group">
                                <input type="text" name="asignatura" class="form-control" placeholder="Asignatura">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="opcionbarajar">
                                    <select name="barajar">
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </label>
                            </div>
                            <button class="btn btn-primary " type="submit">Enviar</button>
                        </div>
                    </div>
                    <br>
                    <a class=" btn btn-danger" href="http://localhost/GestorExamenes/Dashboard">Cancelar </a>
                </div>

            </form>
        </div>

    </div>
</div>