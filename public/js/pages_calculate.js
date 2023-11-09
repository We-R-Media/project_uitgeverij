document.addEventListener('DOMContentLoaded', function() {
    let paginaRedactieInput = document.getElementById('pages_redaction');
    let paginaAdvertentieInput = document.getElementById('pages_adverts');
    let sumElement = document.getElementById('sum');

    if( paginaRedactieInput ){
        paginaRedactieInput.addEventListener('input', updateSum);
    }
    if(paginaAdvertentieInput) {
        paginaAdvertentieInput.addEventListener('input', updateSum);
    }

    function updateSum() {
        let redactieValue = parseInt(paginaRedactieInput.value) || 0;
        let advertentieValue = parseInt(paginaAdvertentieInput.value) || 0;
        let total = redactieValue + advertentieValue;
        sumElement.innerText = "Totaal aantal pagina's " + total;
        $('#sumInput').val(total);
    }
});

