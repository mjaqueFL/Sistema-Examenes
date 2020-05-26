function pruebas() {
    var ultimodiv = $('.row').last().attr('id');

    $("#" + ultimodiv).after('    <hr class="sidebar-divider">        <div class="row"><!-- Cada pregunta en una nueva row -->\n' +
        '                <div class="col">\n' +
        '                    <div class="form-group">\n' +
        '                        <select onchange="select()">\n' +
        '                            <option value="textocorto">Pregunta texto corto</option>\n' +
        '                            <option value="textolargo">Pregunta texto largo(textarea)</option>\n' +
        '                            <option value="tipotest">Pregunta tipo test</option>\n' +
        '                            <option value="respuestamultiple">Pregunta respuesta multiple</option>\n' +
        '                        </select>\n' +
        '                    </div>\n' +
        '                    <!-- Ejemplo de contenido para pregunta TEXTO LARGO-->\n' +
        '                    <div class="form-group">\n' +
        '                       <input type="text" name=""  placeholder="Texto de la pregunta">\n' +
        '                    </div>\n' +
        '                        <img src="icono_eliminar_pregunta"/>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>')
    $('.row').last().attr("id", (parseInt(ultimodiv) + 1));/*cogemos el ultimo id, en este caso es 0 y cada vez que le demos a nueva pregunta generará un  div con id autoincrementado*/
    $('.row:last select').attr("id", "p" + (parseInt(ultimodiv) + 1));/*hacemos select con id autoincrementado*/
    $('.row:last input[type=text]').attr({
        "id": "p" + (parseInt(ultimodiv) + 1) + "_pregunta",
        "name": "p" + (parseInt(ultimodiv) + 1) + "_pregunta"
    });/*id de las preguntas autoincrementado*/

/*    $('.row:last input[type=number]').attr("id", "p" + (parseInt(ultimodiv) + 1) + "_puntos");
    $('.row:last textarea').attr("id", "p" + (parseInt(ultimodiv) + 1) + "_respuesta");*/
    /*    $(myObj).attr({"data-test-1": num1, "data-test-2": num2});*/

}

function select() {
    let select = event.target.id;/*cojo el id del select*/
    let prueba = select.charAt(1); /*id del div*/
    $(function () {
        $("#" + select).on("change", function () {
            switch (this.value) {

                case "textolargo":
            /*        $('#' + select + "_respuesta").remove()*/ /*intento eliminar la respuesta si ya hay una por el id */
                    $("<textarea  placeholder='Introduce respuesta larga'></textarea>").insertAfter('input#' + select + '_pregunta');/*genero codigo*/
                    $('#' + prueba).find('textarea').attr("id", select + "_respuesta");/*pongo el id a lo que he creado segun el div en el que está*/
                    break;
                case "textocorto":
                    $("<input  type='text' placeholder='Introduce respuesta corta'/>").insertAfter('input#' + select + '_pregunta');
                    $('#' + prueba).find('input:text').attr("id", select + "_respuesta");
                    /*               $("#"+prueba).append("<input type='text' placeholder='Introduce respuesta corta'>");*/
                    break;
                case "tipotest":
                    $('<br>' +
                        '<input class="test" type="text" placeholder="Texto respuesta 1">' +
                        '<input type="number" value="1"><br><input class="test" type="text" placeholder="Texto respuesta 2">' +
                        '<input type="number" value="1"><br><input class="test" type="text" placeholder="Texto respuesta 3">' +
                        '<input type="number" value="1"><br><input class="test" type="text" placeholder="Texto respuesta 4">' +
                        '<input type="number" value="1">').insertAfter('input#' + select + '_pregunta');
/*                    $( "input [type=text]" ).each(function() {
                        $(".test").attr("id", select + "_respuesta" + prueba);
                    });aqui intento hacer un bucle que para cada input tipo text con la clase .test ponga el id     */

            }
        });
    });


}