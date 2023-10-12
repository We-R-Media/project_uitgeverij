    document.addEventListener('DOMContentLoaded', function() {
        let contactLinks = document.querySelectorAll('#addContact');

        contactLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                let fullName = this.getAttribute('data-fullname');

                document.getElementById('nameInput').value = fullName;
            });
        });
    });