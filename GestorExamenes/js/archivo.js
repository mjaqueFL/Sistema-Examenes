$(function () {
    $("#seleccionarpreguntas").on("change", function () {
        switch (this.value) {
            case "textolargo":
                $("#prueba").html("<textarea placeholder='Introduce respuesta larga'></textarea>");
                break;
            case "textocorto":
                $("#prueba").html("<input type='text' placeholder='Introduce respuesta corta'>");
                break;
            case "tipotest":
                $("#prueba").empty();
                $("#prueba").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");  //dejo esto asi porque el css de bootstrap hay que editarlo de otra manera
                $("#prueba").append("<input type='text' value='opcion1'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion2'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion3'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion4'>");
                break;
            case "respuestamultiple":
                $("#prueba").empty();
                $("#prueba").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");  //dejo esto asi porque el css de bootstrap hay que editarlo de otra manera
                $("#prueba").append("<input type='text' value='opcion1'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion2'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion3'>");
                $("#prueba").append("<br>");
                $("#prueba").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#prueba").append("<input type='text' value='opcion4'>");
                break;
            /*            default:
                            $("#prueba").html("<input type='text' placeholder='Introduce respuesta corta'>");
                            break;*/
        }
    });
});

function crearelemento() {
    $('#prueba').after('<hr><div class="panel-body">\n' +
        '                <div class="form-group">\n' +
        '                    <select id="nuevodiv">\n' +
        '                        <option value="textocorto">Pregunta texto corto</option>\n' +
        '                        <option value="textolargo">Pregunta texto largo(textarea)</option>\n' +
        '                        <option value="tipotest">Pregunta tipo test</option>\n' +
        '                        <option value="respuestamultiple">Pregunta respuesta multiple</option>\n' +
        '                    </select>\n' +
        '                </div>\n' +
        '                <div class="form-group">\n' +
        '                    <input type="text" name="" id="" placeholder="Introduce pregunta">\n' +
        '                </div>\n' +
        '                <div class="form-group">\n' +
        '                    <input type="number" name="" id="" min="1" max="10" value="1">\n' +
        '                </div>\n' +
        '            </div><div id="spinner"></div><hr>');

    $("#nuevodiv").on("change", function () {
        switch (this.value) {
            case "textolargo":
                $("#spinner").html("<textarea placeholder='Introduce respuesta larga'></textarea>");
                break;
            case "textocorto":
                $("#spinner").html("<input type='text' placeholder='Introduce respuesta corta'>");
                break;
            case "tipotest":
                $("#spinner").empty();
                $("#spinner").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");  //dejo esto asi porque el css de bootstrap hay que editarlo de otra manera
                $("#spinner").append("<input type='text' value='opcion1'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion2'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion3'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='radio' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion4'>");
                break;
            case "respuestamultiple":
                $("#spinner").empty();
                $("#spinner").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");  //dejo esto asi porque el css de bootstrap hay que editarlo de otra manera
                $("#spinner").append("<input type='text' value='opcion1'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion2'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion3'>");
                $("#spinner").append("<br>");
                $("#spinner").append("<input style='margin-right: 10px' type='checkbox' value='Opcion'  name='radio'>");
                $("#spinner").append("<input type='text' value='opcion4'>");
                break;
            /*            default:
                            $("#prueba").html("<input type='text' placeholder='Introduce respuesta corta'>");
                            break;*/
        }
    });

}




