$(document).ready(function () {
    $('#modifexamen').submit(function (e) {
        e.preventDefault();
        $.ajax({

            type: "POST",
            /*           url: "http://localhost/GestorExamenes/Modificar/modificar?examen=sistemas informaticos",*/
            url: "http://localhost/GestorExamenes/Modificar/modificar?examen=<?php echo $this->miexamenconcreto[0]['Titulo examen']?>",

            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.stringify(response);

                /*                        console.log(jsonData);
                                        document.getElementsByName("tituloexamen").innerHTML = jsonData[0].Curso;*/
            }
        });
    });


});


/*
function cambiarDatos(examen) {
    console.log(examen);
    $(document).ready(function (e) {
            $.ajax({
                type: "POST",
                url: "http://localhost/GestorExamenes/Modificar/modificar?nombreexamen=" + examen,
                data: $('#modifexamen').serialize(),
                success: function (response) {
                 /!*   event.preventDefault();*!/
                    /!*                    window.history.pushState(nombreexamen, '', "http://localhost/GestorExamenes/Modificar/modificar?examen=")
                                        jsonData = JSON.stringify(response);
                                        console.log(jsonData);*!/
                    console.log(response)
                    return false;
                }
            });
    });
}
*/


/*
function cambiarNombre() {
    var datosexamen = [];
    datosexamen.push(document.getElementsByName('tituloexamen')[0].value);
    datosexamen.push(document.getElementsByName('curso')[0].value);
    datosexamen.push(document.getElementsByName('asignatura')[0].value);
    datosexamen.push(document.getElementsByName('email')[0].value);
    console.log(datosexamen);
    $.ajax({
        type: "POST",
        url: "http://localhost/GestorExamenes/Modificar/modificar?examen=" + datosexamen,
        success: function (response) {
            /!*
                     window.history.pushState(nombreexamen, '', "http://localhost/GestorExamenes/Modificar/modificar?examen=");
            *!/

            jsonData = JSON.stringify(response);
            console.log(jsonData);
        }
    });

}
*/
