function cargarDatosEnTabla() {
    var tabla = document.getElementById("tablaAlumnos");
    var tbody = tabla.getElementsByTagName("tbody")[0];
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "assets/php/phpInformacionAlumno.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var datos = JSON.parse(xhr.responseText);
            tbody.innerHTML = "";
            datos.forEach(function (alumno) {
                var fila = document.createElement("tr");

                Object.keys(alumno).forEach(function (key) {
                    var celda = document.createElement("td");
                    celda.textContent = alumno[key];
                    fila.appendChild(celda);
                });

                tbody.appendChild(fila);
            });
        }
    };

    xhr.send();
}
cargarDatosEnTabla();
