window.onload = iniciar;
document.getElementById("formularioenviarexamen").onsubmit = crearExamen;

/**
 *
 */
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

/**
 *
 * @returns {HTMLDivElement}
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
 *
 * @param divPregunta
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
 *
 * @param divPregunta
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


function completarPreguntaTextoLargo(divPregunta) {

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

    var div2 = document.createElement('div');
    div2.classList.add("form-group");
    divPregunta.appendChild(div2);

/*    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos:";
    iTextoLabelPuntos.classList.add('input-group-text')
    div2.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.classList.add('form-control');
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;*/
}

function crearPreguntaTest(divPregunta) {

    var div = document.createElement('div');
    div.classList.add("form-group")

    var iTextoLabelOpcion = document.createElement('label');
    iTextoLabelOpcion.classList.add('input-group-text' , 'form-row')
    iTextoLabelOpcion.innerHTML = "Opcion";

    var iTextoRespuesta = document.createElement('input');
    iTextoRespuesta.setAttribute('type', 'radio');
    iTextoRespuesta.setAttribute('value', 'opcion');
    iTextoRespuesta.setAttribute('name', 'preguntatest');
    iTextoLabelOpcion.appendChild(iTextoRespuesta);

    div.appendChild(iTextoLabelOpcion);

    var iTextoRespuesta2 = document.createElement('input');
    iTextoLabelOpcion.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
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
    iTextoLabelPuntos.appendChild(crearIconoBorrarPregunta(divPregunta));

    divPregunta.lastElementChild.previousElementSibling.before(div)

    /*    divPregunta.getElementById('nuevaopcion').before(div);*/
}

function completarPreguntaRespuestaMultiple(divPregunta) {

    var div = document.createElement('div');
    div.classList.add("form-group")

    var iTextoRespuesta = document.createElement('input');
    iTextoRespuesta.setAttribute('type', 'checkbox');
    iTextoRespuesta.setAttribute('value', 'opcion');
    iTextoRespuesta.setAttribute('name', 'preguntamultiple');

    var iTextoLabelOpcion = document.createElement('label');
    iTextoLabelOpcion.classList.add('input-group-text','form-row')
    iTextoLabelOpcion.innerHTML = "Opcion";
    div.appendChild(iTextoLabelOpcion);
    iTextoLabelOpcion.appendChild(iTextoRespuesta);

    var iTextoRespuesta2 = document.createElement('input');
    iTextoLabelOpcion.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'text');
    iTextoRespuesta2.classList.add('form-control')
    iTextoRespuesta2.setAttribute('placeholder', 'opcion');
    iTextoRespuesta2.required = true;

    var iTextoLabelPuntos = document.createElement('label');
    iTextoLabelPuntos.innerHTML = "Puntos ";
    iTextoLabelPuntos.classList.add('input-group-text','form-row')
    iTextoLabelOpcion.appendChild(iTextoLabelPuntos);

    var iPuntos = document.createElement('input');
    iTextoLabelPuntos.appendChild(iPuntos);
    iPuntos.setAttribute('type', 'number');
    iPuntos.classList.add('form-control')
    iPuntos.setAttribute('placeholder', 'Puntos');
    iPuntos.required = true;
    iTextoLabelPuntos.appendChild(crearIconoBorrarPregunta(divPregunta));


    divPregunta.lastElementChild.previousElementSibling.before(div)


    /* divPregunta.lastElementChild('nuevaopcion').before(div);*/

}

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

function crearTextoPreguntaEstaticaArea(divPregunta) {

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

function crearnuevaopcion(divPregunta) {
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

function crearnuevaopcion2(divPregunta) {
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


function crearIconoBorrar() {
    var spanBorrar = document.createElement('span');
    spanBorrar.classList.add('spanBorrar', 'btn', 'btn-danger');
    spanBorrar.appendChild(document.createTextNode('Borrar pregunta'));
    spanBorrar.onclick = borrarPregunta;

    return spanBorrar;
}

function crearIconoBorrarPregunta(divPregunta) {
    var iTextoRespuesta2 = document.createElement('input');
    divPregunta.appendChild(iTextoRespuesta2);
    iTextoRespuesta2.setAttribute('type', 'button')
    iTextoRespuesta2.classList.add('btn', 'btn-secondary')
    iTextoRespuesta2.setAttribute('value', 'Borrar opcion')
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

    evento.target.parentElement.parentElement.remove();

}
function borrarOpcionEstatica(evento) {
    evento.parentNode.remove();
}


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

            completarPreguntaTextoLargo(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta)
            divPregunta.appendChild(crearIconoBorrar());
            break;
        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearnuevaopcion(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            crearPreguntaTest(divPregunta);

            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearnuevaopcion2(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            completarPreguntaRespuestaMultiple(divPregunta);

            break;
    }
}

function cambiarPreguntaestatica(opcion, divPregunta) {
    console.log(opcion);
    console.log(divPregunta);
    switch (opcion) {
        case 'textoCorto':
            divPregunta.setAttribute('data-tipo', 'textoCorto');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            crearSoloRespuestaTextoCorto(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            break;
        case 'textoLargo':
            divPregunta.setAttribute('data-tipo', 'textoLargo');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            completarPreguntaTextoLargo(divPregunta);
            crearSoloPuntosTextoCorto(divPregunta)
            divPregunta.appendChild(crearIconoBorrar());

            break;

        case 'test':
            divPregunta.setAttribute('data-tipo', 'test');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            crearnuevaopcion(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
            crearPreguntaTest(divPregunta);

            break;
        case 'respuestaMultiple':
            divPregunta.setAttribute('data-tipo', 'respuestaMultiple');
            //Quitamos todos los nodos menos el select, la pregunta y la respuesta (que es común a todos los tipos)
            while (divPregunta.childNodes.length > 2)
                divPregunta.removeChild(divPregunta.lastChild);

            crearTextoPreguntaEstatica(divPregunta);
            crearnuevaopcion2(divPregunta);
            divPregunta.appendChild(crearIconoBorrar());
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
                    for (let di of divPregunta.children[i].querySelectorAll('input[name=preguntatest]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                        var preguntatest = {}; //cada opcion es un objeto
                        pregunta.opciones.push(preguntatest);
                        preguntatest.texto = di.nextElementSibling.value;
                        preguntatest.puntos = di.nextElementSibling.nextElementSibling.children[0].value;
                        /*               console.log(di)*/
                    }
                }
                break;
            case 'respuestaMultiple':
                pregunta.opciones = [];
                for (i = 2; i < divPregunta.children.length; i++) {
                    for (let di of divPregunta.children[i].querySelectorAll('input[name=preguntamultiple]')) { //iterar sobre las opciones de las preguntas multiples , el input con el name=preguntatest está en la posicion 5
                        var preguntatest = {}; //cada opcion es un objeto
                        pregunta.opciones.push(preguntatest);
                        preguntatest.texto = di.nextElementSibling.value;
                        preguntatest.puntos = di.nextElementSibling.nextElementSibling.children[0].value;
                        /*               console.log(di)*/
                    }
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

