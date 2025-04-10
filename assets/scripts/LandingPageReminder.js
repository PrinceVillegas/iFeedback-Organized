document.addEventListener('DOMContentLoaded', (event) => {
    const popup = document.getElementById('reminder-popup');
    popup.showModal();

    const button = popup.querySelector('.popup-button');
    button.addEventListener('click', () => {
        popup.close();
    });
});
