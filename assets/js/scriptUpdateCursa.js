$(document).ready(function () {
    $.ajax({
        url: 'assets/php/phpActualizarAlumnos.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            
            var matricula = data.matricula;
            var periodo= data.periodo;
            var nivelDesepeño = data.nivelDesepeño;
            var numeroComplementaria= data.numeroComplementaria

            document.getElementById('matriculaInput2').value = matricula;
            document.getElementById('periodoInput2').value =periodo;
            document.getElementById('nivelDesemInput2').value = nivelDesepeño;
            document.getElementById('numeroComplementariaInput2').value =numeroComplementaria;

        },
        error: function () {
            console.log('Error al obtener datos desde PHP.');
        }
    });
});
