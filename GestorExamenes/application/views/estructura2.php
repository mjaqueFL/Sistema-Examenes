<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Archivo estructura2.php</title>
    <link href="http://localhost/GestorExamenes/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->

    <link href="http://localhost/GestorExamenes/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">-->
    <link href="http://localhost/GestorExamenes/css/estilos.css" rel="stylesheet" type="text/css">

    <!-- Pon los scripts al final del body -->
</head>
<body>


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
               aria-expanded="true" aria-controls="collapseQuiz">
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
    <div class="container-fluid principal">
        <div class="col">
            <h3>Datos Generales</h3>
            <form method="post" id="modifexamen">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <div class="form-group col-md-6 col-10 col-xl-12">
                            <label for="inputTitulo">Titulo examen </label>
                            <input id="inputTitulo" type="text" name="tituloexamen" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Titulo examen'] ?>">
                        </div>
                        <div class="form-group col-md-6 col-xl-12 col-10">
                            <label id="inputCurso">Curso</label>
                            <input id="inputCurso" type="text" name="curso" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Curso'] ?>">
                        </div>
                        <div class="form-group col-md-6 col-xl-12  col-10">
                            <label id="inputAsignatura">Asignatura</label>
                            <input id="inputAsignatura" type="text" name="asignatura" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Asignatura'] ?>">
                        </div>
                        <div class="form-group col-md-6 col-xl-12  col-10">
                            <label id="inputEmail">Email </label>
                            <input id="inputEmail" type="email" name="email" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Email'] ?>">
                        </div>
                        <div class="form-group col-md-6 col-xl-12 col-5">
                            <input type="submit" class=" btn btn-primary">
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                </div>
            </form>
        </div><!-- Cierre de Datos Generales -->

        <div class="col">
            <!-- Cierre de preguntas examen-->
            <form class="" id="formularioenviarexamen"
                  action="http://localhost/GestorExamenes/Examenes/modificardatos?examen=<?php echo $this->miexamenconcreto[0]['Titulo examen'] ?>"
                  method="post">
                <div class=" col-xs-12 mb-3 text-center"><input class="btn btn-primary" id="btnEnviar" type="submit"
                                                                value="Enviar"></div>

                <div class="container" id="divPreguntas">
                    <!-- En este div se crean las nuevas preguntas -->
                    <!--Preguntas examen-->
                    <?php
                    if (isset($this->miexamenconcreto[0]['preguntas']) && sizeof($this->miexamenconcreto[0]['preguntas']) != 0) { //preguntamos si hay preguntas en el examen
                        for ($i = 0; $i < count($this->miexamenconcreto[0]['preguntas']); $i++) { //si hay preguntas en el examen iteramos sobre todas las preguntas
                            //mostramos el titulo de la pregunta , da igual el tipo
                            if (isset($this->miexamenconcreto[0]['preguntas'][$i]['opciones'])) {
                                ?>
                                <div class="pregunta"
                                     data-tipo="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['tipo'] ?>">
                                    <span onclick="borrarPreguntaEstatica(this)" class="spanBorrar"> ✘ </span>
                                    <div class="form-group">
                                        <select class="form-control"
                                                onchange="cambiarPreguntaestatica(this.value, this.parentNode.parentNode)">
                                            <option value="textoCorto">Pregunta con Texto Corto</option>
                                            <option value="textoLargo">Pregunta con Texto Largo</option>
                                            <option value="test">Pregunta tipo Test</option>
                                            <option value="respuestaMultiple">Pregunta con Respueta Múltiple</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-group-text">Pregunta:
                                            <input required class="form-group" type="text"
                                                   value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['texto'] ?>">
                                        </label>
                                    </div>
                                    <input type="button" value="nueva opcion">
                                    <?php
                                    for ($j = 0; $j < count($this->miexamenconcreto[0]['preguntas'][$i]['opciones']); $j++) {//si se encuentra que la pregunta es tipo test / respuesta multiple iteramos sobre el nºopciones
                                        if ($this->miexamenconcreto[0]['preguntas'][$i]['tipo'] == 'respuestaMultiple') { // si la pregunta es respuesta multiple que muestre las respuestas en checkbox
                                            ?>
                                            <br>
                                            <input type="checkbox" name="preguntamultiple">
                                            <div class="form-group">
                                                <label class="input-group-text">
                                                    <input class="form-group" type="text"
                                                           value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['texto'] ?>"
                                                           required>
                                                </label></div>
                                            <div class="form-group">
                                                <label class="input-group-text">
                                                    <input class="form-group" type="number"
                                                           value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['puntos'] ?>"
                                                           required>
                                                </label></div>
                                            <input type="button" value="borrar opcion">

                                            <?php

                                        } else {
                                            ?>
                                            <br>
                                            <input type="radio" name="preguntatest">
                                            <label class="input-group-text">Opcion <input type="text"
                                                                                          value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['texto'] ?>"
                                                                                          required>
                                            </label>
                                            <label class="input-group-text">Puntos <input class="form-control"
                                                                                          type="number"
                                                                                          value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['puntos'] ?>"
                                                                                          required>
                                            </label>
                                            <input type="button" value="borrar opcion">
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="pregunta"
                                     data-tipo="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['tipo'] ?>">
                                    <div class="form-group">
                                        <select class="form-control"
                                                onchange="cambiarPreguntaestatica(this.value, this.parentNode)">
                                            <option value="textoCorto">Pregunta con Texto Corto</option>
                                            <option value="textoLargo">Pregunta con Texto Largo</option>
                                            <option value="test">Pregunta tipo Test</option>
                                            <option value="respuestaMultiple">Pregunta con Respueta Múltiple</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-group-text">Pregunta:<input class="form-control" type="text"
                                                                                        value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['texto'] ?>"
                                                                                        required></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="input-group-text">Respuesta<input class="form-control" type="text"
                                                                                        value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['respuesta'] ?>"
                                                                                        required></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-group-text">Puntos:<input class="form-control" type="number"
                                                                                      value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['puntos'] ?>"
                                                                                      required></label>
                                    </div>
                                    <span onclick="borrarPreguntaEstatica(this)" class="spanBorrar btn btn-danger">Borrar pregunta</span>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php
                    } else {
                        echo "<span id='nohaypreguntas'>No hay preguntas en el examen</span>";
                    }
                    ?>
                    <!--          <input hidden type="submit" value="Enviar">-->
                </div>
            </form>


            <hr class="sidebar-divider"><!-- Los botones de añadir preguntas y enviar siempre al final -->

            <button id="btnNuevaPregunta">Nueva pregunta</button>

            <!--        <a id="btnEnviar"
           href="http://localhost/GestorExamenes/Examenes/modificardatos?examen=<?php /*echo $this->miexamenconcreto[0]['Titulo examen'] */ ?>"
           class="btn btn-danger">Enviar </a>-->
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="http://localhost/GestorExamenes/js/archivo2.js"></script>
<script type="text/javascript" src="http://localhost/GestorExamenes/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#modifexamen').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/GestorExamenes/Modificar/modificar?nombreexamen=<?php echo $this->miexamenconcreto[0]['Titulo examen']?>",
                data: $(this).serialize(),
                success: function (response) {
                    window.history.pushState("http://localhost/GestorExamenes/Examenes", "estructura2.php", "crearpreguntas?examen=" + document.getElementsByName('tituloexamen')[0].value);

                    /*           var jsonData = JSON.stringify(response);*/

                    /*                        console.log(jsonData);
                                            document.getElementsByName("tituloexamen").innerHTML = jsonData[0].Curso;*/
                }
            });
        });


    });
</script>
</body>
</html>
