
document.addEventListener("DOMContentLoaded", function() {
    const paragraphText = "Exploramos los pilares fundamentales en lo que te apasiona como cultivar habilidades prácticas y asi mismo construir relaciones duraderas.";

    function typeWriter(text, elementId, delay) {
        const element = document.getElementById(elementId);
        let index = 0;

        function type() {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
                setTimeout(type, delay);
            }
        }
        type();
    }
    typeWriter(paragraphText, "typed-paragraph", 50);

});
function abrirVentanaInformacion() {
    var ventana = document.getElementById('vent');
    if (ventana.style.display === 'block') {
        ventana.style.display = 'none';
        document.body.classList.remove("no-scroll");
    } else {
        ventana.style.display = 'block';
        document.body.classList.add("no-scroll");
    }
    
}

function abrirVentanaComplementaria() {
    var ventana = document.getElementById('vent-Comple');
    if (ventana.style.display === 'block') {
        ventana.style.display = 'none';
        document.body.classList.remove("no-scroll");
    } else {
        ventana.style.display = 'block';
        document.body.classList.add("no-scroll");
    }
    
}