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
                <div  class="login-panel panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" name="tituloexamen" class="form-control" placeholder="Titulo examen"
                                   required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="curso" class="form-control" placeholder="Curso" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="asignatura" class="form-control" placeholder="Asignatura" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
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
</html>

