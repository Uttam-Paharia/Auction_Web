window.addEventListener('DOMContentLoaded', () => {
    const form1 = document.getElementById('signup-form');
    form1.addEventListener('submit', (event) => {
        const inputs = form1.querySelectorAll('input, textarea');
        let hasError = false;

        inputs.forEach((input) => {
            const errorElement = document.getElementById(`${input.id}_error`);

            if (input.value.trim() === '') {
                errorElement.textContent = 'This field is required.';
                hasError = true;
            } else {
                errorElement.textContent = ''; // Clear error message
            }
        });

        if (!hasError) {
            const form2 = document.getElementById('signup-form2');
            const inputs2 = form2.querySelectorAll('input, textarea');

            inputs2.forEach((input) => {
                const errorElement = document.getElementById(`${input.id}_error`);

                if (input.value.trim() === '') {
                    errorElement.textContent = 'This field is required.';
                    hasError = true;
                } else {
                    errorElement.textContent = ''; // Clear error message
                }
            });
        }

        if (!hasError) {
            const form3 = document.getElementById('signup-form3');
            const inputs3 = form3.querySelectorAll('input, textarea');

            inputs3.forEach((input) => {
                const errorElement = document.getElementById(`${input.id}_error`);

                if (input.value.trim() === '') {
                    errorElement.textContent = 'This field is required.';
                    hasError = true;
                } else {
                    errorElement.textContent = ''; // Clear error message
                }
            });
        }

        if (!hasError) {
            const phoneInput = document.getElementById('phone');
            const phoneErrorElement = document.getElementById('phone_error');

            if (!isValidPhoneNumber(phoneInput.value)) {
                phoneErrorElement.textContent = 'Please enter a valid phone number';
                hasError = true;
            } else {
                phoneErrorElement.textContent = ''; // Clear error message
            }
        }

        if (!hasError) {
            // Open index.html or perform other actions on successful form submission
            // window.open('index.html', '_self');
        }
    });
});

document.querySelector('#phone').addEventListener('input', () => {
    let val = document.querySelector('#phone').value;
    let pattern = /^[1-9]\d{9}$/;
    if (!pattern.test(val)) {
        document.querySelector('#phone_error').innerHTML = "Please enter a valid phone number";
    } else {
        document.querySelector('#phone_error').innerHTML = "";
    }
});

document.querySelector('#username').addEventListener('input', () => {
    let val = document.querySelector('#username').value;
    let pattern = /^[^@]*$/;
    if (!pattern.test(val)) {
        document.querySelector('#username_error').innerHTML = "Username must not contain @";
    } else {
        document.querySelector('#username_error').innerHTML = "";
    }
});

document.querySelector('#password').addEventListener('input', () => {
    let val = document.querySelector('#password').value;
    let pattern = /.{8,}/;
    if (!pattern.test(val)) {
        document.querySelector('#password_error').innerHTML = "Weak Password";
        document.querySelector('#password_tick').innerHTML = "";
    } else {
        document.querySelector('#password_error').innerHTML = "";
        document.querySelector('#password_tick').innerHTML = "<i class='fa-solid fa-square-check' style='color: #22aa32;'></i>";
    }
});

document.querySelector('#confirm_password').addEventListener('input', () => {
    let val = document.querySelector('#confirm_password').value;
    if (!(val == document.querySelector('#password').value)) {
        document.querySelector('#confirm_password_error').innerHTML = "Passwords do not match";
    } else {
        document.querySelector('#confirm_password_error').innerHTML = "";
    }
});

function isValidPhoneNumber(phoneNumber) {
    const pattern = /^[1-9]\d{9}$/;
    return pattern.test(phoneNumber);
}
