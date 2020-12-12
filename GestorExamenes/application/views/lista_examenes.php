<!doctype html>
<html lang="en">
<head>
    <title>ListaExamenes-Gestor Examenes</title>
</head>
<?php
include('templates/dashboard.php');
?>
<div class="container-fluid">
    <div class="tablaexamen">
        <?php
        if (isset($this->borrado)) {
            ?>
            <div class="alert alert-danger" role="alert">
                Examen borrado con exito
            </div>
            <?php
        }
        ?>
        <h3>Lista examenes</h3>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                <tr>
                    <th>Titulo examen</th>
                    <th>Curso</th>
                    <th>Asignatura</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    foreach ($this->misexamenes as $valor) {
                        echo '<tr>';
                        echo '<td>' . $valor['Titulo examen'] . '</td>';
                        echo '<td>' . $valor['Curso'] . '</td>';
                        echo '<td>' . $valor['Asignatura'] . '</td>';
                        ?>
                        <td>
                            <a href="<?php echo base_url() ?>Examenes/crearpreguntas?examen=<?php echo $valor["Titulo examen"] ?>"><span
                                        class="fas fa-edit fa-lg"></span>

                            </a>
                            <a href="<?php echo base_url() ?>Examenes/antesborrar?examen=<?php echo $valor["Titulo examen"] ?>"><span
                                        class="fas fa-times fa-lg"></span></a>
                        </td>
                        <?php
                        echo '</tr>';
                    }
                    ?>
                </tr>
                </tbody>
            </table>
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

</div>
</html>