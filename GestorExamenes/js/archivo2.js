window.onload = iniciar;

function iniciar() {

    document.getElementById("btnNuevaPregunta").onclick = crearPregunta;
}

function crearPregunta() {
    var divPreguntas = document.getElementById("divPreguntas");
    var barrahorizontal = document.createElement('hr');
    divPreguntas.appendChild(barrahorizontal);
    barrahorizontal.setAttribute("class", "sidebar-divider")

    divPreguntas.appendChild(crearPreguntaTextoCorto());
}

function crearPreguntaTextoCorto() {
    var divPregunta = document.createElement('div');	//Metemos cada pregunta en un div de clase pregunta
    divPregunta.classList.add('pregunta');
    divPregunta.setAttribute('data-tipo', 'textoCorto')
    divPregunta.appendChild(crearSelect());

    var iTextoPregunta = document.createElement('input');
    divPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'text');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');

    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');

    completarPreguntaTextoCorto(divPregunta);

    return divPregunta;
}

function crearSelect() {
    var select = document.createElement('select');
    select.onchange = cambiarPregunta;
    select.appendChild(crearOpcion('textoCorto', 'Pregunta con Texto Corto'));
    select.appendChild(crearOpcion('textoLargo', 'Pregunta con Texto Largo'));
    select.appendChild(crearOpcion('test', 'Pregunta tipo Test'));
    select.appendChild(crearOpcion('respuestaMultiple', 'Pregunta con Respueta Múltiple'));
    return select;
}

function crearOpcion(valor, texto) {
    var opcion = document.createElement('option');
    opcion.setAttribute('value', valor);
    opcion.appendChild(document.createTextNode(texto));
    return opcion;
}

function cambiarPregunta(evento) {
    var opcion = evento.target.value;
    var divPregunta = evento.target.parentNode;


    switch (opcion) {
        case 'textoCorto':
            divPregunta.setAttribute('data-tipo', 'textoCorto');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            completarPreguntaTextoCorto2(divPregunta);
            completarPreguntaTextoCorto(divPregunta);

            break;
        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            completarPreguntaTextoLargo(divPregunta);
            break;
        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            crearPreguntaTest(divPregunta);
            crearnuevaopcion(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            completarPreguntaRespuestaMultiple(divPregunta);
            crearnuevaopcion2(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            break;
    }
}

function completarPreguntaTextoCorto(divPregunta) {

    var iPuntos = document.createElement('input');
    divPregunta.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');

    divPregunta.appendChild(crearIconoBorrar());

}
function crearPuntos(divPregunta) {
    var iPuntos = document.createElement('input');
    divPregunta.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');
}
function completarPreguntaTextoCorto2(divPregunta) {
    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');

}

function completarPreguntaTextoLargo(divPregunta) {
    var iTextoRespuesta = document.createElement('textarea');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');

    var iPuntos = document.createElement('input');
    divPregunta.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');

    divPregunta.appendChild(crearIconoBorrar());

}

function crearPreguntaTest(divPregunta) {
    crearseparacion(divPregunta)


    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'radio');
    iTextoRespuesta.setAttribute('value', 'opcion');

    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text')
    iTextoRespuesta2.setAttribute('placeholder', 'opcion')
    crearPuntos(divPregunta)
}

function completarPreguntaRespuestaMultiple(divPregunta) {
    crearseparacion(divPregunta)
    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'checkbox')
    iTextoRespuesta.setAttribute('value', 'opcion')
    iTextoRespuesta.setAttribute('name', 'preguntatest')


    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text')
    iTextoRespuesta2.setAttribute('placeholder', 'opcion')
    crearPuntos(divPregunta)
}

function crearnuevaopcion(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text')
    iTextoRespuesta2.setAttribute('placeholder', 'crear nueva opcion')
    iTextoRespuesta2.addEventListener("click", function (event) {
        crearPreguntaTest(divPregunta);
    });
}

function crearnuevaopcion2(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text')
    iTextoRespuesta2.setAttribute('placeholder', 'crear nueva opcion')
    iTextoRespuesta2.addEventListener("click", function (event) {
        completarPreguntaRespuestaMultiple(divPregunta);
    });
}

function crearseparacion(divPregunta) {
    var espaciopregunta = document.createElement('br');
    divPregunta.appendChild(espaciopregunta);
}

function crearIconoBorrar() {
    var spanBorrar = document.createElement('span');
    spanBorrar.classList.add('spanBorrar');
    spanBorrar.appendChild(document.createTextNode(' \u2718 '));
    spanBorrar.onclick = borrarPregunta;

    return spanBorrar;
}

function borrarPregunta(evento) {
    var divPregunta = evento.target.parentNode;
    divPregunta.parentNode.removeChild(divPregunta);
}

function redirigircontrolador() {

}
