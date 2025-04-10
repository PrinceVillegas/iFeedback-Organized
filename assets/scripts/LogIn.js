document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.loginForm');

    form.addEventListener('submit', (e) => {
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        const usernameError = document.getElementById('username-error');
        const passwordError = document.getElementById('password-error');

        let hasError = false;

        if (usernameInput.value === '') {
            usernameError.style.display = 'block';
            usernameError.textContent = '*Please enter your username';
            hasError = true;
        } else {
            usernameError.style.display = 'none';
        }

        if (passwordInput.value === '') {
            passwordError.style.display = 'block';
            passwordError.textContent = '*Please enter your password';
            hasError = true;
        } else {
            passwordError.style.display = 'none';
        }

        if (hasError) {
            e.preventDefault();
        }
    });
});