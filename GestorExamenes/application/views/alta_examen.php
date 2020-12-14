<!doctype html>
<html lang="en">
<head>
    <title>Alta Examenes-GestorExamenes</title>
</head>
<?php
include('templates/dashboard.php');
?>
<div class="container-fluid">
    <h3>Alta examen</h3>
    <div class="row">
        <form method="post" action="<?php echo base_url() ?>Examenes/crearexamen">
            <div class="col-md-12">
                <br>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="tituloexamen">
                                TITULO EXAMEN
                                <input id="tituloexamen" size="100" type="text" name="tituloexamen" class="form-control"
                                       placeholder="Titulo examen"
                                       required autofocus>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="curso">
                                CURSO
                                <input id="curso" size="100" type="text" name="curso" class="form-control"
                                       placeholder="Curso"
                                       required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="asignatura">
                                ASIGNATURA
                                <input id="asignatura" size="100" type="text" name="asignatura" class="form-control"
                                       placeholder="Asignatura" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email" id="email">
                                EMAIL
                                <input id="email" size="100" type="email" name="email" class="form-control"
                                       value="<?php echo $_SESSION['email'] ?>" required readonly="readonly"> <!--disabled no manda datos,
                              readonly si los manda y no permite que se escriba sobre el campo-->
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="opcionbarajar">
                                Barajar Examen?
                                <select id="opcionbarajar" name="barajar">
                                    <option value="True">True</option>
                                    <option value="False">False</option>
                                </select>
                            </label>
                        </div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
                <br>
                <a class=" btn btn-danger" href="<?php echo base_url() ?>Dashboard">Cancelar</a>
            </div>

        </form>
    </div>
</div>
<?php
include 'templates/footer.php'
?>
<?php
include 'templates/comprobacionescookie.php'
?>
<?php
include 'templates/divcookie.php'
?>
</html>

