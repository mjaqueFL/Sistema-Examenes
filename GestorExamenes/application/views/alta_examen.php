<!doctype html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\dashboard.php');

?>
<div class="container-fluid">
    <h3>Alta examen</h3>
    <div class="row">
        <form method="post" action="http://localhost/GestorExamenes/Examenes/crearexamen">
            <div class="col-md-12">
                <br>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="tituloexamen">
                                TITULO EXAMEN
                                <input id="tituloexamen" type="text" name="tituloexamen" class="form-control"
                                       placeholder="Titulo examen"
                                       required autofocus>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="curso">
                                CURSO
                                <input id="curso" type="text" name="curso" class="form-control" placeholder="Curso"
                                       required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="asignatura">
                                ASIGNATURA
                                <input id="asignatura" type="text" name="asignatura" class="form-control"
                                       placeholder="Asignatura" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email" id="email">
                                EMAIL
                                <input id="email" type="email" name="email" class="form-control"
                                       value="<?php echo $_SESSION['email'] ?>" required readonly="readonly"> <!--disabled no manda datos,
                              readonly si los manda y no permite que se escriba sobre el campo-->
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="opcionbarajar">
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
                <a class=" btn btn-danger" href="http://localhost/GestorExamenes/Dashboard">Cancelar </a>
            </div>

        </form>
    </div>
    <?php
    include('C:\xampp\htdocs\GestorExamenes\application\views\templates\footer.php');
    ?>
</div>

</html>

