$(document).ready(function () {
    $.ajax({
        url: 'assets/php/phpObtenerDatosRegister.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var matricula = data.matricula;
            var nombreCompleto = data.nombreCompleto;

            document.getElementById('matriculaInput').value = matricula;
            document.getElementById('alumnoInput').value = nombreCompleto;
        },
        error: function () {
            console.log('Error al obtener datos desde PHP.');
        }
    });
});
