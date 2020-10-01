window.onload = iniciar;

function iniciar() {

    document.getElementById("btnNuevaPregunta").onclick = crearPregunta;
    document.getElementsByName('tituloexamen').value;
    document.getElementById("btnEnviar").onclick = crearExamen;
}

function crearPregunta() {
    var divPreguntas = document.getElementById("divPreguntas");
    /*    var barrahorizontal = document.createElement('hr');
        divPreguntas.appendChild(barrahorizontal);
        barrahorizontal.setAttribute("class", "sidebar-divider")*/

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
            divPregunta.appendChild(crearIconoBorrar());
            crearnuevaopcion(divPregunta);
            crearPreguntaTest(divPregunta);
            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            divPregunta.appendChild(crearIconoBorrar());
            crearnuevaopcion2(divPregunta);
            completarPreguntaRespuestaMultiple(divPregunta);
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
    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
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
    iTextoRespuesta.setAttribute('name', 'preguntatest')
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');

    crearPuntos(divPregunta);
    divPregunta.appendChild(crearIconoBorrarPregunta(divPregunta));
}

function completarPreguntaRespuestaMultiple(divPregunta) {
    crearseparacion(divPregunta)
    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'checkbox')
    iTextoRespuesta.setAttribute('value', 'opcion')
    iTextoRespuesta.setAttribute('name', 'preguntamultiple')


    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');
    crearPuntos(divPregunta);
    divPregunta.appendChild(crearIconoBorrarPregunta(divPregunta));
}

function crearnuevaopcion(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button');
    iTextoRespuesta2.setAttribute('value', 'nueva opcion');
    iTextoRespuesta2.addEventListener("click", function (event) {
        crearPreguntaTest(divPregunta);
    });
}

function crearnuevaopcion2(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button')
    iTextoRespuesta2.setAttribute('value', 'crear nueva opcion')
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

function crearIconoBorrarPregunta(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button')
    iTextoRespuesta2.setAttribute('value', 'borrar  opcion')
    iTextoRespuesta2.onclick = borrarOpcion;
    return iTextoRespuesta2;
}

function borrarPregunta(evento) {
    var divPregunta = evento.target.parentNode;
    divPregunta.parentNode.removeChild(divPregunta);
}

function borrarOpcion(evento) {

    for (let i = 0; i < 4; i++) {
        evento.target.previousSibling.remove();
    }
    evento.target.remove();


}

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
    let j = 0;
    for (let divPregunta of divsPregunta) { //Iteramos sobre las preguntas
        var pregunta = {}; //Cada pregunta será un objeto
        examen.preguntas.push(pregunta); //Añadimos la pregunta al array
        pregunta.id = document.getElementsByName('tituloexamen').value + "-P" + j;
        pregunta.tipo = divPregunta.getAttribute("data-tipo");
        pregunta.texto = divPregunta.children[1].value; //children[0] es el select
        switch (pregunta.tipo) {
            case 'textoLargo':
                pregunta.respuesta = divPregunta.children[2].value;
                pregunta.puntos = divPregunta.children[3].value;
                break;
            case 'textoCorto':
                pregunta.respuesta = divPregunta.children[2].value;
                pregunta.puntos = divPregunta.children[3].value;
                break;
            case 'test':
                pregunta.opciones = [];
                for (let di of divPregunta.querySelectorAll('input[name=preguntatest]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                    var preguntatest = {}; //cada opcion es un objeto
                    pregunta.opciones.push(preguntatest);
                    preguntatest.texto = di.nextElementSibling.value;
                    preguntatest.puntos = di.nextElementSibling.nextElementSibling.value;
                }
                break;
            case 'respuestaMultiple':
                pregunta.opciones = [];
                for (let di of divPregunta.querySelectorAll('input[name=preguntamultiple]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                    var preguntamult = {}; //cada opcion es un objeto
                    pregunta.opciones.push(preguntamult);
                    preguntamult.texto = di.nextElementSibling.value;
                    preguntamult.puntos = di.nextElementSibling.nextElementSibling.value;
                }
                break;

        }
        j++;
    }
    var link = document.getElementById('btnEnviar');
    var objson = JSON.stringify(examen);
    link.href.innerHTML += link.href += "&j=" + objson;


}

