window.addEventListener('DOMContentLoaded', () => {
    const form1 = document.getElementById('signup-form');
    form1.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent form submission

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

        // Check for specific errors
        const usernameInput = document.getElementById('username');
        const usernameErrorElement = document.getElementById('username_error');

        if (usernameInput.value.includes('@')) {
            usernameErrorElement.textContent = 'Username must not contain @';
            hasError = true;
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
            window.open('index.html', '_self');
        }
    });
});
