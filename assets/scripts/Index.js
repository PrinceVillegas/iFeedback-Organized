/*sign in error handler */
const form = document.querySelector('.signUpForm');

form.addEventListener('submit', (e) => {
    const firstNameInput = document.getElementById('firstName');
    const middleNameInput = document.getElementById('middleName');
    const surnameInput = document.getElementById('surname');
    const sectionSelect = document.getElementById('section');
    const studentIDInput = document.getElementById('studentID');
    const usernameInput = document.getElementById('usernameSU');
    const passwordInput = document.getElementById('passwordSU');
    const confirmPasswordInput = document.getElementById('confirmPasswordSU');

    const firstNameError = document.getElementById('firstName-error');
    const middleNameError = document.getElementById('middleName-error');
    const surnameError = document.getElementById('surname-error');
    const sectionError = document.getElementById('section-error');
    const studentIDError = document.getElementById('studentID-error');
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirmPassword-error');

    let hasError = false;

    if (firstNameInput.value === '') {
        firstNameError.style.display = 'block';
        hasError = true;
    } else {
        firstNameError.style.display = 'none';
    }
    if (middleNameInput.value === '') {
        middleNameError.style.display = 'block';
        hasError = true;
    } else {
        middleNameError.style.display = 'none';
    }

    if (surnameInput.value === '') {
        surnameError.style.display = 'block';
        hasError = true;
    } else {
        surnameError.style.display = 'none';
    }
if (sectionSelect.selectedIndex === 0) {
    sectionError.style.display = 'block';
    hasError = true;
} else {
    sectionError.style.display = 'none';
}

if (studentIDInput.value === '') {
    studentIDError.style.display = 'block';
    studentIDError.textContent = '*Please enter your student ID';
    hasError = true;
} else if (studentIDInput.value.length < 11 || studentIDInput.value.length > 11) {
    studentIDError.style.display = 'block';
    studentIDError.textContent = '*Please enter your 11-digit student ID';
    hasError = true;
} else {
    studentIDError.style.display = 'none';
}

    if (usernameInput.value === '') {
        usernameError.style.display = 'block';
        hasError = true;
    } else {
        usernameError.style.display = 'none';
    }

    if (passwordInput.value === '') {
        passwordError.style.display = 'block';
        hasError = true;
    } else {
        passwordError.style.display = 'none';
    }

    if (confirmPasswordInput.value === '') {
        confirmPasswordError.style.display = 'block';
        hasError = true;
    } else if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.style.display = 'block';
        confirmPasswordError.textContent = 'Passwords do not match';
        hasError = true;
    } else {
        confirmPasswordError.style.display = 'none';
    }

    if (hasError) {
        e.preventDefault();
    }   

});