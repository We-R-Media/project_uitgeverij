document.addEventListener('livewire:load', function () {
    Livewire.on('preventFormSubmission', () => {
        document.getElementById('outside-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
        });
    });
});