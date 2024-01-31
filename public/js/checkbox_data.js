document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.export--checkbox');
    const hiddenInputContainer = document.querySelector('.export-form');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateHiddenInputs();
        });
    });

    function updateHiddenInputs() {
        // Remove existing hidden inputs
        document.querySelectorAll('.export-hidden-input').forEach(function (input) {
            input.remove();
        });

        // Create an array to store checkbox values
        const selectedProjects = [];

        // Create hidden inputs for checked checkboxes and update the array
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'selected_values[]');
                hiddenInput.value = checkbox.value;
                hiddenInput.classList.add('export-hidden-input');
                hiddenInputContainer.appendChild(hiddenInput);

                // Update the array with checkbox values
                selectedProjects.push(checkbox.value);
            }
        });
    }
});
