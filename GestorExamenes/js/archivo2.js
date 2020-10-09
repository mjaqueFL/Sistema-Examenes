window.onload = iniciar;
document.getElementById("formularioenviarexamen").onsubmit = crearExamen;

function iniciar() {

    document.getElementById("btnNuevaPregunta").onclick = crearPregunta;
    document.getElementsByName('tituloexamen').value;
}

function crearPregunta() {
    var divPreguntas = document.getElementById("divPreguntas");
    divPreguntas.appendChild(crearPreguntaTextoCorto());
    if (document.getElementById("nohaypreguntas") != undefined && document.getElementById("nohaypreguntas") != null) {
        document.getElementById("nohaypreguntas").hidden = true;
    }

}

function crearPreguntaTextoCorto() {
    var divPregunta = document.createElement('div');	//Metemos cada pregunta en un div de clase pregunta
    divPregunta.classList.add('pregunta');
    divPregunta.setAttribute('data-tipo', 'textoCorto')
    divPregunta.appendChild(crearSelect());

    var iTextoLabelPregunta = document.createElement('label');
    iTextoLabelPregunta.innerHTML = "Pregunta";
    iTextoLabelPregunta.classList.add('list-group-item-primary', 'ml-2')
    divPregunta.appendChild(iTextoLabelPregunta);

    divPregunta.appendChild(crearIconoBorrar());

    var iTextoPregunta = document.createElement('input');
    iTextoLabelPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'text');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');
    iTextoPregunta.required = true;

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('list-group-item-action')
    divPregunta.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('input');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.classList.add('list');

    iTextoRespuesta.required = true;

    crearSoloPuntosTextoCorto(divPregunta);

    return divPregunta;
}


function crearSoloPuntosTextoCorto(divPregunta) {

    var iTextoLabel = document.createElement('label');
    iTextoLabel.innerHTML = "Puntos";
    iTextoLabel.classList.add('list-group-item-action')
    divPregunta.appendChild(iTextoLabel);

    var iPuntos = document.createElement('input');
    iTextoLabel.appendChild(iPuntos);
    iPuntos.classList.add('list');
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;

    /*    divPregunta.appendChild(crearIconoBorrar());*/

}

function crearSoloRespuestaTextoCorto(divPregunta) {

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('list-group-item-action')
    divPregunta.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('input');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'text');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.required = true;
    /*    divPregunta.appendChild(crearIconoBorrar());*/


}


function completarPreguntaTextoLargo(divPregunta) {

    var iTextoLabelRespuesta = document.createElement('label');
    iTextoLabelRespuesta.innerHTML = "Respuesta";
    iTextoLabelRespuesta.classList.add('list-group-item-action')
    divPregunta.appendChild(iTextoLabelRespuesta);

    var iTextoRespuesta = document.createElement('textarea');
    iTextoLabelRespuesta.appendChild(iTextoRespuesta);
    /*    iTextoRespuesta.setAttribute('class', "list-group-item-action");*/
    iTextoRespuesta.classList.add('list', 'ml-2');
    iTextoRespuesta.setAttribute('placeholder', 'Texto de la respuesta');
    iTextoRespuesta.required = true;

    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos";
    iTextoLabelPuntos.classList.add('list-group-item-action')
    divPregunta.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.classList.add('list', 'ml-2');
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;


}

function crearPreguntaTest(divPregunta) {
    crearseparacion(divPregunta)

    var iTextoRespuesta = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta);
    iTextoRespuesta.setAttribute('type', 'radio');
    iTextoRespuesta.setAttribute('value', 'opcion');
    iTextoRespuesta.setAttribute('name', 'preguntatest');

    var iTextoLabelOpcion = document.createElement('label');
    iTextoLabelOpcion.innerHTML = "Opcion";
    iTextoLabelOpcion.classList.add('list-group-horizontal', 'ml-2')
    divPregunta.appendChild(iTextoLabelOpcion);

    var iTextoRespuesta2 = document.createElement('input');
    iTextoLabelOpcion.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');
    iTextoRespuesta2.required = true;

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
    iTextoRespuesta2.required = true;
    crearPuntos(divPregunta);
    divPregunta.appendChild(crearIconoBorrarPregunta(divPregunta));
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

function cambiarSelect(elemento) {
    console.log(elemento);
    elemento.onchange = cambiarPregunta;

}

function crearOpcion(valor, texto) {
    var opcion = document.createElement('option');
    opcion.setAttribute('value', valor);
    opcion.appendChild(document.createTextNode(texto));
    return opcion;
}

function crearTextoPreguntaEstatica(divPregunta) {

    var iTextoLabelPregunta = document.createElement('label');
    iTextoLabelPregunta.innerHTML = "Pregunta";
    iTextoLabelPregunta.classList.add('list-group-item-primary', 'ml-2')
    divPregunta.appendChild(iTextoLabelPregunta);

    var iTextoPregunta = document.createElement('input');
    iTextoLabelPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'text');
    iTextoPregunta.setAttribute('class', 'list');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');
    iTextoPregunta.required = true;

    return iTextoLabelPregunta
}

function crearTextoPreguntaEstaticaArea(divPregunta) {

    var iTextoLabelPregunta = document.createElement('label');
    iTextoLabelPregunta.innerHTML = "Pregunta";
    iTextoLabelPregunta.classList.add('list-group-item-primary', 'ml-2')
    divPregunta.appendChild(iTextoLabelPregunta);

    var iTextoPregunta = document.createElement('input');
    iTextoLabelPregunta.appendChild(iTextoPregunta);
    iTextoPregunta.setAttribute('type', 'textarea');
    iTextoPregunta.setAttribute('class', 'list');
    iTextoPregunta.setAttribute('placeholder', 'Texto de la pregunta');
    iTextoPregunta.required = true;

    return iTextoLabelPregunta
}

function crearPuntos(divPregunta) {
    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos ";
    iTextoLabelPuntos.classList.add('list-group-horizontal', 'ml-2')
    divPregunta.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;
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

function borrarPreguntaEstatica(elemento) {
    var divPregunta = elemento.parentNode
    divPregunta.parentNode.removeChild(divPregunta);
}

function borrarOpcion(evento) {

    for (let i = 0; i < 4; i++) {
        evento.target.previousSibling.remove();
    }
    evento.target.remove();
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
            divPregunta.appendChild(crearIconoBorrar());
            crearSoloRespuestaTextoCorto(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta);

            break;
        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            divPregunta.appendChild(crearIconoBorrar());
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

function cambiarPreguntaestatica(opcion, divPregunta) {

    switch (opcion) {
        case 'textoCorto':
            divPregunta.setAttribute('data-tipo', 'textoCorto');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            divPregunta.appendChild(crearTextoPreguntaEstatica(divPregunta))
            divPregunta.appendChild(crearIconoBorrar());
            crearSoloRespuestaTextoCorto(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta);

            break;
        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            divPregunta.appendChild(crearTextoPreguntaEstatica(divPregunta));
            divPregunta.appendChild(crearIconoBorrar());
            completarPreguntaTextoLargo(divPregunta);
            break;

        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            divPregunta.appendChild(crearTextoPreguntaEstatica(divPregunta))
            divPregunta.appendChild(crearIconoBorrar());
            crearnuevaopcion(divPregunta);
            crearPreguntaTest(divPregunta);
            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);
            divPregunta.appendChild(crearTextoPreguntaEstatica(divPregunta))
            divPregunta.appendChild(crearIconoBorrar());
            crearnuevaopcion2(divPregunta);
            completarPreguntaRespuestaMultiple(divPregunta);
            break;
    }
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
        /*pregunta.id = document.getElementsByName('tituloexamen').children[0].value + "-P" + j;*/
        pregunta.id = document.getElementsByName('tituloexamen')[0].value + "-P" + j;
        pregunta.tipo = divPregunta.getAttribute("data-tipo");
        pregunta.texto = divPregunta.children[1].children[0].value; //children[0] es el select
        switch (pregunta.tipo) {
            case 'textoLargo':
                pregunta.respuesta = divPregunta.children[3].children[0].value;
                pregunta.puntos = divPregunta.children[4].children[0].value
                break;
            case 'textoCorto':
                pregunta.respuesta = divPregunta.children[3].children[0].value;
                pregunta.puntos = divPregunta.children[4].children[0].value
                break;
            case 'test':
                pregunta.opciones = [];
                for (let di of divPregunta.querySelectorAll('input[name=preguntatest]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                    var preguntatest = {}; //cada opcion es un objeto
                    pregunta.opciones.push(preguntatest);
                    preguntatest.texto = di.nextElementSibling.children[0].value;
                    preguntatest.puntos = di.nextElementSibling.nextElementSibling.children[0].value;
                }
                break;
            case 'respuestaMultiple':
                pregunta.opciones = [];
                for (let di of divPregunta.querySelectorAll('input[name=preguntamultiple]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                    var preguntamult = {}; //cada opcion es un objeto
                    pregunta.opciones.push(preguntamult);
                    preguntamult.texto = di.nextElementSibling.children[0].value;
                    preguntamult.puntos = di.nextElementSibling.nextElementSibling.children[0].value;
                }
                break;

        }
        j++;
    }

    var link = document.getElementById('formularioenviarexamen');
    var objson = JSON.stringify(examen);
    link.action.innerHTML += link.action += "&j=" + objson;
    link.submit();
}

