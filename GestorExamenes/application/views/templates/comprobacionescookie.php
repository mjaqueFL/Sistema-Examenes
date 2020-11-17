<script>
    /* ésto comprueba la localStorage si ya tiene la variable guardada */
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var username = getCookie("nombre");
        if (username != "") {
            cajacookies.style.display = 'none';
        }
    }

    function aceptarCookies() {
        document.cookie = "nombre=data";
        cajacookies.style.display = 'none';
    }

    function denegarcookie() {
        alert("No has aceptado la cookie");
    }

    /* ésto se ejecuta cuando la web está cargada */
    $(document).ready(function () {
        checkCookie();
    });
</script>