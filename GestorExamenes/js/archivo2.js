
window.onload = iniciar;
document.getElementById("formularioenviarexamen").onsubmit = crearExamen;


/**
 * Cuando se carga la página modificar_examen.php se inicia este método
 *
 * Se le asigna al voton nueva pregunta el metodo crearPregunta para que cada vez que se pulse se genere
 * otro div con una pregunta
 */
function iniciar() {
    document.getElementById("btnNuevaPregunta").onclick = crearPregunta;
}

/**
 * Metodo que crea un nuevo div sobre divPreguntas
 *
 * Este metodo localiza en el html el divPreguntas y le añade una nueva pregunta
 * que por defecto es una de textocorto.Tambien oculta el mensaje de "no hay preguntas" cuando añades una
 * nueva pregunta
 */
function crearPregunta() {
    var divPreguntas = document.getElementById("divPreguntas");
    divPreguntas.appendChild(crearPreguntaTextoCorto());
    if (document.getElementById("nohaypreguntas") != undefined && document.getElementById("nohaypreguntas") != null) {
        document.getElementById("nohaypreguntas").hidden = true;
    }

}

/**
 * Metodo que crea toda la estructura de la pregunta de texto corto
 *
 * Este método crea todos los div, label y etiquetas necesarias del div
 * @returns {HTMLDivElement} Retorna el div con todos los elementos para hacer el append del mismo en divPreguntas
 */
function crearPreguntaTextoCorto() {

    var divPregunta = document.createElement('div');	//Metemos cada pregunta en un div de clase pregunta
    divPregunta.classList.add('pregunta',);
    divPregunta.setAttribute('data-tipo', 'textoCorto');

    var div0 = document.createElement('div');
    div0.classList.add("form-group");
    divPregunta.appendChild(div0);

    div0.appendChild(crearSelect());

    var div1 = document.createElement('div');
    div1.classList.add("form-group");
    divPregunta.appendChild(div1);

    var iTextoLabelPregunta = document.createElement('label');
    iTextoLabelPregunta.innerHTML = "Pregunta";
    iTextoLabelPregunta.classList.add('input-group-text')
    divPregunta.appendChild(iTextoLabelPregunta);

    var iTextoPregunta = document.createElement('input');
    iTextoLabelPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'text');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');
    iTextoPregunta.classList.add('form-control');
    iTextoPregunta.required = true;

    var div2 = document.createElement('div');
    div2.classList.add("form-group");
    divPregunta.appendChild(div2);

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('input-group-text')
    divPregunta.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('input');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.classList.add('form-control');
    iTextoRespuesta.required = true;

    div1.appendChild(iTextoLabelPregunta);
    div2.appendChild(iTextoLabelRespuesta);
    crearSoloPuntosTextoCorto(divPregunta);
    divPregunta.appendChild(crearIconoBorrar());
    return divPregunta;
}

/**
 * Crea los puntos del div de la pregunta de texto corto
 * @param divPregunta Recibe el div padre sobre el que se está trabajando
 */
function crearSoloPuntosTextoCorto(divPregunta) {

    var div1 = document.createElement('div');
    div1.classList.add("form-group");
    divPregunta.appendChild(div1);

    var iTextoLabel = document.createElement('label');
    iTextoLabel.innerHTML = "Puntos:";
    iTextoLabel.classList.add('input-group-text')
    divPregunta.appendChild(iTextoLabel);

    var iPuntos = document.createElement('input');
    iTextoLabel.appendChild(iPuntos);
    iPuntos.classList.add('form-control');
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;

    div1.appendChild(iTextoLabel);
    /*    divPregunta.appendChild(crearIconoBorrar());*/

}

/**
 * Metodo que  crea la respuesta de la pregunta de texto corto
 *
 * Método que crea solo la respuesta de texto corto, que se invoca al
 * cambiar de pregunta en el select, ya que al hacerlo solo borra respuesta y puntos
 * y mantiene la pregunta
 * @param divPregunta Recibe el div padre sobre el que se está trabajando
 */
function crearSoloRespuestaTextoCorto(divPregunta) {

    var div1 = document.createElement('div');
    div1.classList.add("form-group");
    divPregunta.appendChild(div1);

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('input-group-text')
    div1.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('input');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.classList.add('form-control');
    iTextoRespuesta.required = true;


    /*    divPregunta.appendChild(crearIconoBorrar());*/


}

/**
 * Metodo que  crea la respuesta de la pregunta de texto largo
 *
 * Método que crea solo la respuesta de texto corto, que se invoca al
 * cambiar de pregunta en el select, ya que al hacerlo solo borra respuesta y puntos
 * y mantiene la pregunta
 * @param divPregunta Recibe el div padre sobre el que se está trabajando
 */

function crearSoloRespuestaTextoLargo(divPregunta) {

    var div1 = document.createElement('div');
    div1.classList.add("form-group");
    divPregunta.appendChild(div1);

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('input-group-text')
    div1.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('textarea');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    /*    iTextoRespuesta.setAttribute('class', "input-group-text");*/
    iTextoRespuesta.classList.add('form-control');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.required = true;
}

/**
 * Crea el div de la pregunta de tipo test
 *
 * Metodo que crea la pregunta de tipo test, con las opciones , los puntos y el boton de borrar opcion,
 * la opcion añadida se añadirá despues de la ultima opcion
 * @param divPregunta  Recibe el div padre sobre el que se está trabajando
 */
function crearPreguntaTest(divPregunta) {

    var div = document.createElement('div');
    div.classList.add("form-group")

    var iTextoLabelOpcion = document.createElement('label');
    iTextoLabelOpcion.classList.add('input-group-text', 'form-row')
    iTextoLabelOpcion.innerHTML = "Opcion";

/*
    var iTextoRespuesta = document.createElement('input');
    iTextoRespuesta.setAttribute('type', 'radio');
    iTextoRespuesta.setAttribute('value', 'opcion');
    iTextoRespuesta.setAttribute('name', 'preguntatest');
    iTextoLabelOpcion.appendChild(iTextoRespuesta);
*/

    div.appendChild(iTextoLabelOpcion);

    var iTextoRespuesta2 = document.createElement('input');
    iTextoLabelOpcion.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.setAttribute('id', 'opciontest');
    iTextoRespuesta2.classList.add('form-control')
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');
    iTextoRespuesta2.required = true;

    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos ";
    iTextoLabelPuntos.classList.add('input-group-text', 'form-row');
    iTextoLabelOpcion.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.classList.add('form-control')
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;
    iTextoLabelPuntos.appendChild(crearIconoBorrarOpcion(divPregunta));

    divPregunta.lastElementChild.previousElementSibling.before(div)

    /*    divPregunta.getElementById('nuevaopcion').before(div);*/
}

/**
 * Crea el div de la pregunta de tipo multiple
 *
 * Metodo que crea la pregunta de tipo test, con las opciones , los puntos y el boton de borrar opcion,
 * la opcion añadida se añadirá despues de la ultima opcion
 * @param divPregunta  Recibe el div padre sobre el que se está trabajando
 */
function completarPreguntaRespuestaMultiple(divPregunta) {

    var div = document.createElement('div');
    div.classList.add("form-group")

    var iTextoLabelOpcion = document.createElement('label');
    iTextoLabelOpcion.classList.add('input-group-text', 'form-row')
    iTextoLabelOpcion.innerHTML = "Opcion";
    div.appendChild(iTextoLabelOpcion);

    var iTextoRespuesta2 = document.createElement('input');
    iTextoLabelOpcion.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.setAttribute('id', 'opcionmultiple');
    iTextoRespuesta2.classList.add('form-control')
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');
    iTextoRespuesta2.required = true;

    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos ";
    iTextoLabelPuntos.classList.add('input-group-text', 'form-row')
    iTextoLabelOpcion.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.classList.add('form-control')
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;
    iTextoLabelPuntos.appendChild(crearIconoBorrarOpcion(divPregunta));


    divPregunta.lastElementChild.previousElementSibling.before(div)


    /* divPregunta.lastElementChild('nuevaopcion').before(div);*/

}

/**
 * Crea el select del div del tipo de pregunta sobre el que se cree
 *
 * Este método crea el select de cualquier tipo de pregunta(tipocorto,tipolargo,test y multiple)
 *
 * @returns {HTMLSelectElement} Devuelve el elemento creado sobre el div que está invocando el metodo
 */
function crearSelect() {

    var select = document.createElement('select');
    select.onchange = cambiarPregunta;
    select.appendChild(crearOpcion('textoCorto', 'Pregunta con Texto Corto'));
    select.appendChild(crearOpcion('textoLargo', 'Pregunta con Texto Largo'));
    select.appendChild(crearOpcion('test', 'Pregunta tipo Test'));
    select.appendChild(crearOpcion('respuestaMultiple', 'Pregunta con Respueta Múltiple'));
    select.classList.add("form-control")
    return select;
}

/**
 * Metodo que crea los option del select
 *
 * Este metodo se invoca 4 veces, una por cada tipo de pregunta y crean los option con cada tipo de pregunta
 *
 * @param valor el valor del value de los option del select
 * @param texto El texto que se muestra en los option
 * @returns {HTMLOptionElement}
 */
function crearOpcion(valor, texto) {
    var opcion = document.createElement('option');
    opcion.setAttribute('value', valor);
    opcion.appendChild(document.createTextNode(texto));
    return opcion;
}

/**
 * Este metodo crea el texto de la pregunta y su input
 *
 * Este método es para la pregunta que viene de la base de datos si el examen tiene preguntas ya creadas
 * Sobre el archivo modificarexamen hay un select estático que al cambiar de pregunta borra todo el div con la pregunta
 *
 * @param divPregunta  Recibe el div padre sobre el que se está trabajando
 * @returns {HTMLDivElement} Devuelve el elemento creado sobre el div que está invocando el metodo
 */
function crearTextoPreguntaEstatica(divPregunta) {

    var div1 = document.createElement('div');
    div1.classList.add("form-group");
    divPregunta.appendChild(div1);

    var iTextoLabelPregunta = document.createElement('label');
    iTextoLabelPregunta.innerHTML = "Pregunta";
    iTextoLabelPregunta.classList.add('input-group-text')
    div1.appendChild(iTextoLabelPregunta);

    var iTextoPregunta = document.createElement('input');
    iTextoLabelPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'text');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');
    iTextoPregunta.classList.add('form-control');
    iTextoPregunta.required = true;

    return div1;
}

/**
 * Metodo que crea el boton nueva opcion
 *
 * Este método se invoca solo para las pregunta de tipo test
 * que crea el boton "nueva opcion" que al ser clicado crea otra pregunta de tipo test
 * @param divPregunta
 */
function crearnuevaopciontest(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button');
    iTextoRespuesta2.setAttribute('id', 'nuevaopcion');
    iTextoRespuesta2.classList.add('btn', 'btn-info');
    iTextoRespuesta2.setAttribute('value', 'nueva opcion');
    iTextoRespuesta2.addEventListener("click", function (event) {
        crearPreguntaTest(divPregunta);
    });

}
/**
 * Metodo que crea el boton nueva opcion
 *
 * Este método se invoca solo para las preguntas de tipo test y respuesta multiple,
 * que crea el boton "nueva opcion" que al ser clicado crea otra pregunta de tipo multiple
 * @param divPregunta Recibe el div padre sobre el que se está trabajando
 */
function crearnuevaopcionmultiple(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button')
    iTextoRespuesta2.setAttribute('id', 'nuevaopcion');
    iTextoRespuesta2.classList.add('btn', 'btn-info');
    iTextoRespuesta2.setAttribute('value', 'nueva opcion');
    iTextoRespuesta2.addEventListener("click", function (event) {
        completarPreguntaRespuestaMultiple(divPregunta);
    });
}

/**
 * Metodo que crea el boton de borrar pregunta
 *
 * Este metodo crea el boton para borrar la pregunta sobre el que estará este boton
 * @returns {HTMLSpanElement} Devuelve el elemento creado sobre el div que está invocando el metodo
 */

function crearIconoBorrar() {
    var spanBorrar = document.createElement('span');
    spanBorrar.classList.add('spanBorrar', 'btn', 'btn-danger');
    spanBorrar.appendChild(document.createTextNode('Borrar pregunta'));
    spanBorrar.onclick = borrarPregunta;

    return spanBorrar;
}

/**
 * Este método crea el boton de borrar opcion
 *
 * Este boton estará sobre cada opcion que se cree sobre una pregunta de tipo test/multiple
 * @param divPregunta Recibe el div padre sobre el que se está trabajando
 * @returns {HTMLInputElement} Devuelve el elemento creado sobre el div que está invocando el metodo
 */
function crearIconoBorrarOpcion(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button')
    iTextoRespuesta2.classList.add('btn', 'btn-secondary')
    iTextoRespuesta2.setAttribute('value', 'Borrar opcion')
    iTextoRespuesta2.onclick = borrarOpcion;
    return iTextoRespuesta2;
}

/**
 * Crea el metodo que borra la opcion
 *
 * Este metodo recoge el evento del boton borraropcion y borra el div que contiene la opcion
 * @param evento tipo de evento que se ha producido
 */
function borrarPregunta(evento) {
    console.log(evento);
    var divPregunta = evento.target.parentNode;
    divPregunta.parentNode.removeChild(divPregunta);

}

/**
 * Hace lo mismo que el borrarPregunta pero sobre las preguntas que vienen de la base de datos
 *
 * Este método es como el borrarPregunta pero se invoca desde el archivo modificar_examen
 * @param elemento Recibe el elemento que está invocando al metodo
 */
function borrarPreguntaEstatica(elemento) {
    var divPregunta = elemento.parentNode
    divPregunta.parentNode.removeChild(divPregunta);
}

/**
 * Crea el metodo que borra el div que contiene la opcion de la pregunta
 *
 * Este metodo se invoca al pulsar el boton "borraropcion" que borrara el div que contiene
 * el boton
 * @param evento recibe el evento del boton
 */
function borrarOpcion(evento) {

    evento.target.parentElement.parentElement.remove();

}

/**
 * Crea el metodo que borra el div que contiene la opcion de la pregunta desde el archivo modificar_examen
 *
 * Este metodo se invoca al pulsar el boton "borraropcion" que borrara el div que contiene
 * el boton
 * @param evento recibe el evento del boton
 */
function borrarOpcionEstatica(evento) {
    evento.parentElement.parentElement.remove();
}

/**
 * Metodo que cambia la estructura del div de cada pregunta
 *
 * Este método se invoca al cambiar de tipo de pregunta en el select option
 * y dependiendo del tipo de pregunta se cargan unos metodos u otros que crearan
 * los elementos de ese div de esa pregunta
 * @param evento recibe el tipo de evento del select
 */
function cambiarPregunta(evento) {

    var opcion = evento.target.value;
    var divPregunta = evento.target.parentNode.parentNode;
    console.log(opcion);
    console.log(divPregunta);

    switch (opcion) {
        case 'textoCorto':
            divPregunta.setAttribute('data-tipo', 'textoCorto');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearSoloRespuestaTextoCorto(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            break;

        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearSoloRespuestaTextoLargo(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta)
            divPregunta.appendChild(crearIconoBorrar());
            break;
        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearnuevaopciontest(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            crearPreguntaTest(divPregunta);

            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearnuevaopcionmultiple(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            completarPreguntaRespuestaMultiple(divPregunta);

            break;
    }
}

/**
 * Metodo que cambia la estructura del div de cada pregunta
 *
 * Este método se invoca al cambiar de tipo de pregunta en el select option
 * y dependiendo del tipo de pregunta se cargan unos metodos u otros que crearan
 * los elementos de ese div de esa pregunta
 *
 * Este metodo se usa para los select estáticos en modificar_examen para las preguntas que vienen
 * de la base de datos
 * @param evento recibe el tipo de evento del select
 */
function cambiarPreguntaestatica(opcion, divPregunta) {
    console.log(opcion);
    console.log(divPregunta);
    switch (opcion) {
        case 'textoCorto':
            divPregunta.setAttribute('data-tipo', 'textoCorto');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearSoloRespuestaTextoCorto(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            break;
        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);


            crearSoloRespuestaTextoLargo(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta)
            divPregunta.appendChild(crearIconoBorrar());

            break;

        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            crearnuevaopciontest(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            crearPreguntaTest(divPregunta);

            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            crearnuevaopcionmultiple(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            completarPreguntaRespuestaMultiple(divPregunta);

            break;
    }
}

/**
 * Metodo que crea el examen
 *
 * Este metodo se invoca al enviar el examen, y va iterando sobre cada pregunta del formulario y va guardando
 * los datos en un objeto, que posteriormente se convierte a formato JSON y se envia a mongo
 *
 */
function crearExamen() {
    var examen = {}; //Objeto de examen que pasaremos a JSON
//Cargamos los datos generales
    examen.titulo = document.getElementsByName('tituloexamen').value;
    examen.curso = document.getElementsByName('curso').value;
    examen.asignatura = document.getElementsByName('asignatura').value;
    examen.email = document.getElementsByName('email').value;
//... resto de campos

    examen.preguntas = [];

    var divsPregunta = document.getElementsByClassName("pregunta"); //Devuelve una HTMLCollection
    let i = 2;
    let j = 0;
    for (let divPregunta of divsPregunta) { //Iteramos sobre las preguntas
        var pregunta = {}; //Cada pregunta será un objeto
        examen.preguntas.push(pregunta); //Añadimos la pregunta al array
        /*pregunta.id = document.getElementsByName('tituloexamen').children[0].value + "-P" + j;*/
        pregunta.id = document.getElementsByName('tituloexamen')[0].value + "-P" + j;
        pregunta.tipo = divPregunta.getAttribute("data-tipo");
        pregunta.texto = divPregunta.children[1].children[0].children[0].value; //children[0] es el select
        switch (pregunta.tipo) {
            case 'textoLargo':
                pregunta.respuesta = divPregunta.children[2].children[0].children[0].value;
                pregunta.puntos = divPregunta.children[3].children[0].children[0].value;
                break;
            case 'textoCorto':
                pregunta.respuesta = divPregunta.children[2].children[0].children[0].value;
                pregunta.puntos = divPregunta.children[3].children[0].children[0].value;

                break;
            case 'test':
                pregunta.opciones = [];
                for (i = 2; i < divPregunta.children.length; i++) {
                    for (let di of divPregunta.children[i].querySelectorAll('input[id=opciontest]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                        var preguntatest = {}; //cada opcion es un objeto
                        pregunta.opciones.push(preguntatest);
/*                        preguntatest.texto = di.nextElementSibling.value;
                        preguntatest.puntos = di.nextElementSibling.nextElementSibling.children[0].value;       */
                        preguntatest.texto = di.value;
                        preguntatest.puntos = di.nextElementSibling.children[0].value;
                        /*               console.log(di)*/
                    }
                }
                break;
            case 'respuestaMultiple':
                pregunta.opciones = [];
                for (i = 2; i < divPregunta.children.length; i++) {
                    for (let di of divPregunta.children[i].querySelectorAll('input[id=opcionmultiple]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                        var preguntatest = {}; //cada opcion es un objeto
                        pregunta.opciones.push(preguntatest);
                        preguntatest.texto = di.value;
                        preguntatest.puntos = di.nextElementSibling.children[0].value;
                        /*               console.log(di)*/
                    }
                }
                break;
        }
        j++;
    }
/*    var link = document.getElementById('formularioenviarexamen');
    var objson = JSON.stringify(examen);
    link.action.innerHTML += link.action += "&examengenerado=" + objson;
    link.submit();*/
    var objson=JSON.stringify(examen);
    return objson;

}

