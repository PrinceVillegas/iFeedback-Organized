// ABOUT US //
function showAboutUs() {
    document.querySelector('.AboutUs').showModal();
}

function closeDialogAU() {
    document.querySelector('.AboutUs').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseAU').addEventListener('click', closeDialogAU);
});

// FAQs //
function showFAQs() {
    document.querySelector('.FAQs').showModal();
}


function closeDialogFAQs() {
    document.querySelector('.FAQs').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseFAQs').addEventListener('click', closeDialogFAQs);


    const checkboxes = document.querySelectorAll('.collapsible input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                checkboxes.forEach(other => {
                    if (other !== checkbox) {
                        other.checked = false;
                    }
                });
            }
        });
    });
});

// CONTACT US

function showContactUs() {
    document.querySelector('.ContactUs').showModal();
}

function closeDialogCU() {
    document.querySelector('.ContactUs').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseCU').addEventListener('click', closeDialogCU);
});


const submitButton = document.querySelector('.contactUsSubmitbtn');

submitButton.addEventListener('click', function(event) {
    event.preventDefault();

    const firstNameInput = document.querySelector('.formFN input');
    const lastNameInput = document.querySelector('.formLN input');
    const emailInput = document.querySelector('.formEmail input');
    const phoneInput = document.querySelector('.formPhone input');
    const messageInput = document.querySelector('.formMessage');

    if (firstNameInput.value.trim() === '' || lastNameInput.value.trim() === '' || emailInput.value.trim() === '' || phoneInput.value.trim() === '' || messageInput.value.trim() === '') {
        alert('Please fill in all the required fields.');
        return;
    }

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(emailInput.value)) {
        alert('Please enter a valid email address.');
        return;
    }

    document.getElementById("ContactUs").close();
    document.getElementById("ContactUsPopUp").showModal();

    firstNameInput.value = '';
    lastNameInput.value = '';
    emailInput.value = '';
    phoneInput.value = '';
    messageInput.value = '';
});

// CONTACT US SUBMIT - MESSAGE
  
document.querySelector(".popup-contact-button").addEventListener("click", () => {
    document.getElementById("ContactUsPopUp").close();
});



// FAQs to Contact Us

function faqsToContactUs() {
    document.querySelector('.ContactUs').showModal();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.faqsToContactUs').addEventListener('click', closeDialogFAQs);
});

// PRIVACY POLICY

function showPrivacyPolicy() {
    document.querySelector('.privacyPolicy').showModal();
}


function closeDialogPrivacyPolicy() {
    document.querySelector('.privacyPolicy').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnClosePrivacyPolicy').addEventListener('click', closeDialogPrivacyPolicy);

});

// TERMS OF SERVICE

function showTermsOfService() {
    document.querySelector('.termsOfService').showModal();
}

function closeDialogTermsOfService() {
    document.querySelector('.termsOfService').close();
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.btnCloseTermsOfService').addEventListener('click', closeDialogTermsOfService);

});

