$(document).ready(function () {
    $.ajax({
        url: 'assets/php/phpEditarDatos.php',
        type: 'GET',
        dataType: 'json',
        
        success: function (data) {
            var matricula = data.matricula;
            var idComplementaria = data.idComplementaria;
            var periodo = data.periodo;
            var numeroComplementaria = data.numeroComplementaria;
            var nivelDesempeño = data.nivelDesempeño;

            document.getElementById('matriculaInput').value = matricula;
            document.getElementById('idcomplementariaInput').value = idComplementaria;
            document.getElementById('periodoInput').value = periodo;
            document.getElementById('numeroComplementariaInput').value = numeroComplementaria;
            document.getElementById('nivelDesemInput').value = nivelDesempeño;
        },
        error: function () {
            console.log('Error al obtener datos desde PHP.');
        }
    });
});
