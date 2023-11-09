
const nameInput = document.getElementById('name-field');

if(nameInput) {
    nameInput.addEventListener('focus', function() {
        console.log(true);
    });
}
