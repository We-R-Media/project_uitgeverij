document.addEventListener('DOMContentLoaded', function() {
    let paginaRedactieInput = document.getElementById('pagina_redactie');
    let paginaAdvertentieInput = document.getElementById('pagina_advertentie');
    let sumElement = document.getElementById('sum');

    paginaRedactieInput.addEventListener('input', updateSum);
    paginaAdvertentieInput.addEventListener('input', updateSum);

    function updateSum() {
        let redactieValue = parseInt(paginaRedactieInput.value) || 0;
        let advertentieValue = parseInt(paginaAdvertentieInput.value) || 0;
        let total = redactieValue + advertentieValue;
        sumElement.innerText = "Totaal aantal pagina's " + total;
    }
});