let alt_addresses;

document.addEventListener("DOMContentLoaded", function () {
    alt_addresses = document.querySelectorAll('.options');

    alt_addresses.forEach(alt_address => {
        alt_address.style.display = 'none';
    });
});

const toggleFormDisplay = (value) => {
    alt_addresses = document.querySelectorAll('.options');
    console.log(alt_addresses);

    alt_addresses.forEach(alt_address => {
        if (value == 1) {
            console.log(value);
            alt_address.style.display = 'none';
        } else {
            alt_address.style.display = 'flex';
        }
    });
};

toggleFormDisplay(1);