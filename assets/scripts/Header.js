// LOGIN

function showLogin() {
    document.querySelector('.Login').showModal();
}

function closeDialogLogin() {
    document.querySelector('.Login').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseLogin').addEventListener('click', closeDialogLogin);
});


// SIGN UP

function showSignUp() {
    document.querySelector('.SignUp').showModal();
}

function closeDialogSignUp() {
    document.querySelector('.SignUp').close();
    const firstNameInput = document.querySelector('#firstName');
    const middleNameInput = document.querySelector('#middleName');
    const surnameInput = document.querySelector('#surname');
    const sectionSelect = document.querySelector('#section');
    const studentIDInput = document.querySelector('#studentID');
    const usernameInput = document.querySelector('#usernameSU');
    const passwordInput = document.querySelector('#passwordSU');
    const confirmPasswordInput = document.querySelector('#confirmPasswordSU');
    firstNameInput.value = '';
    middleNameInput.value = '';
    surnameInput.value = '';
    sectionSelect.value = '';
    studentIDInput.value = '';
    usernameInput.value = '';
    passwordInput.value = '';
    confirmPasswordInput.value = '';
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseSignUp').addEventListener('click', closeDialogSignUp);
});

document.querySelector('#studentID').addEventListener('keydown', function(event) {
    if (this.value.length >= 11 && event.key !== 'Backspace' && event.key !== 'Delete') {
      event.preventDefault();
    }
});


// LOGIN to SIGN UP

function loginToSignUp() {
    document.querySelector('.SignUp').showModal();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.loginToSignUp').addEventListener('click', closeDialogLogin);
});

// SIGN UP to LOGIN

function signUpToLogin() {
    document.querySelector('.Login').showModal();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.signUpToLogin').addEventListener('click', closeDialogSignUp);
});