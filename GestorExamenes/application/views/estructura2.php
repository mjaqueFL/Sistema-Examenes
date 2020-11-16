<!doctype html>
<html lang="en">
<?php
include('templates/dashboard.php');
?>
<body>
<div class="container-fluid">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Datos cambiados!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Datos del examen cambiados
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h3 class="mt-4">Datos Generales</h3>
        <form method="post" id="modifexamen">
            <div class="login-panel panel panel-default">
                <div class="panel-body">
                    <div class="form-group ">
                        <label for="inputTitulo">
                            Titulo examen
                            <input size="100" id="inputTitulo" type="text" name="tituloexamen" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Titulo examen'] ?>">
                        </label>
                    </div>
                    <div class="form-group ">
                        <label for="inputCurso">
                            Curso
                            <input size="100" id="inputCurso" type="text" name="curso" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Curso'] ?>">
                        </label>
                    </div>
                    <div class="form-group ">
                        <label for="inputAsignatura">
                            Asignatura
                            <input size="100" id="inputAsignatura" type="text" name="asignatura" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Asignatura'] ?>">
                        </label>
                    </div>
                    <div class="form-group ">
                        <label for="inputEmail">Email
                            <input readonly="readonly" size="100" id="inputEmail" type="email" name="email" class="form-control"
                                   value="<?php echo $this->miexamenconcreto[0]['Email'] ?>">
                        </label>
                    </div>
                    <div class="form-group col-md-6 col-xl-12 col-5">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
                <hr class="sidebar-divider">
            </div>
        </form>
    </div><!-- Cierre de Datos Generales -->

    <div class="col">
        <!-- Cierre de preguntas examen-->
        <form  id="formularioenviarexamen"
              method="post">
            <div class=" col-xs-12 mb-3 text-center"><input class="btn btn-success" id="btnEnviar" type="submit"
                                                            value="Enviar"></div>
            <!-- Modal -->
            <div class="modal fade" id="enviarexamen" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Preguntas enviadas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Preguntas del examen cambiadas
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
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
                                <div class="form-group">
                                    <label for="seleccionartipopregunta">
                                        <select id="seleccionartipopregunta" class="form-control"
                                                onchange="cambiarPreguntaestatica(this.value, this.parentNode.parentNode.parentNode)">
                                            <option value="textoCorto">Pregunta con Texto Corto</option>
                                            <option value="textoLargo">Pregunta con Texto Largo</option>
                                            <option value="test">Pregunta tipo Test</option>
                                            <option value="respuestaMultiple">Pregunta con Respueta Múltiple</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="textopregunta" class="input-group-text">Pregunta
                                        <input id="textopregunta" required class="form-control" type="text"
                                               value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['texto'] ?>">
                                    </label>
                                </div>
                                <?php
                                for ($j = 0; $j < count($this->miexamenconcreto[0]['preguntas'][$i]['opciones']); $j++) {//si se encuentra que la pregunta es tipo test / respuesta multiple iteramos sobre el nºopciones
                                    if ($this->miexamenconcreto[0]['preguntas'][$i]['tipo'] == 'respuestaMultiple') { // si la pregunta es respuesta multiple que muestre las respuestas en checkbox
                                        ?>
                                        <div class="form-group">
                                            <label for="opcionmultiple" class="input-group-text form-row">Opcion
                                                <!--                                                <input class="opcionmultiple" hidden type="checkbox" name="preguntamultiple">-->
                                                <input id="opcionmultiple" class="form-control " type="text"
                                                       value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['texto'] ?>"
                                                       required>
                                                <label class="input-group-text form-row">Puntos <input
                                                            class="form-control "
                                                            type="number"
                                                            value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['puntos'] ?>"
                                                            required>
                                                    <input class=" btn btn-secondary"
                                                           onclick="borrarOpcionEstatica(this)" type="button"
                                                           value="Borrar opcion"></label>
                                            </label>

                                        </div>
                                        <?php

                                    } else {
                                        ?>
                                        <div class="form-group">
                                            <label for="opciontest" class="input-group-text form-row">Opcion
                                                <!--                                                <input hidden  type="radio" name="preguntatest">-->
                                                <input id="opciontest" class="form-control " type="text"
                                                       value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['texto'] ?>"
                                                       required>
                                                <label class="input-group-text form-row">Puntos <input
                                                            class="form-control"
                                                            type="number"
                                                            value="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['opciones'][$j]['puntos'] ?>"
                                                            required>
                                                    <input class=" btn btn-secondary"
                                                           onclick="borrarOpcionEstatica(this)" type="button"
                                                           value="Borrar opcion">
                                                </label>

                                            </label>
                                        </div>
                                        <?php
                                    }
                                }
                                ?> <!--   <input onclick="console.log(parentNode.getAttribute('data-tipo'))"-->
                                <input onclick="if (this.parentNode.getAttribute('data-tipo')=='respuestaMultiple'){completarPreguntaRespuestaMultiple(parentNode)} else { if (this.parentNode.getAttribute('data-tipo')=='test'){crearPreguntaTest(this.parentNode)}}"
                                       type="button" value="nueva opcion" id="nuevaopcion" class="btn btn-info">
                                <span onclick="borrarPreguntaEstatica(this)" class="spanBorrar btn btn-danger">Borrar pregunta</span>
                            </div>

                            <?php
                        } else {
                            ?>
                            <div class="pregunta"
                                 data-tipo="<?php echo $this->miexamenconcreto[0]['preguntas'][$i]['tipo'] ?>">
                                <div class="form-group">
                                    <label for="cambiarpreguntasestatica">
                                        <select id="cambiarpreguntasestatica" class="form-control"
                                                onchange="cambiarPreguntaestatica(this.value, this.parentNode.parentNode.parentNode)">
                                            <option value="textoCorto">Pregunta con Texto Corto</option>
                                            <option value="textoLargo">Pregunta con Texto Largo</option>
                                            <option value="test">Pregunta tipo Test</option>
                                            <option value="respuestaMultiple">Pregunta con Respueta Múltiple</option>
                                        </select>
                                    </label>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#modifexamen').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url:"<?php echo base_url()?>Examenes/modificarajax?nombreexamen=<?php echo $this->miexamenconcreto[0]['Titulo examen']?>",
                data: $(this).serialize(),
                success: function (response) {
                    window.history.pushState("<?php echo base_url()?>Examenes", "estructura2.php", "crearpreguntas?examen=" + document.getElementsByName('tituloexamen')[0].value);
                    $("#exampleModalCenter").modal('show');
                    $('#exampleModalCenter').on('hidden.bs.modal', function () {
                        location.reload();
                    })
            /*        setTimeout(function()
                    {
                        location.reload();  //Refresh page
                    }, 5000);*/
                }
            });
        });
        $('#formularioenviarexamen').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url:"<?php echo base_url()?>Examenes/modificardatos?examen=<?php echo $this->miexamenconcreto[0]['Titulo examen']?>",
                data: {data: crearExamen()},
                success: function (response) {
                    $("#enviarexamen").modal('show');

                }
            });

        });


    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/archivo2.js"></script>

</body>
</html>
