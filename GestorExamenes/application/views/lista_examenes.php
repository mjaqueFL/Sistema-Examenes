<!doctype html>
<html lang="en">
<?php
include('C:\xampp\htdocs\GestorExamenes\application\views\templates\dashboard.php');
?>
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
                                            src="<?php echo base_url('imagenes/edit.png'); ?>" alt="editarexamen"></a>
                                <!--                          <a href="http://localhost/GestorExamenes/Examenes/listarpreguntasexamen?examen=<?php /*echo $valor["Titulo examen"] */ ?>"><img
                                                src="<?php /*echo base_url('imagenes/edit.png'); */ ?>"></a>-->
                                <a href="http://localhost/GestorExamenes/Examenes/antesborrar?examen=<?php echo $valor["Titulo examen"] ?>"><img
                                            src="<?php echo base_url('imagenes/cross.png'); ?>" alt="borrarexamen"></a>
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
</html>