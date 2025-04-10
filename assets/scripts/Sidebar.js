const sidebar = document.getElementById('sidebar');

sidebar.addEventListener('click', () => {
    sidebar.classList.toggle('open');
});


document.querySelector(".logout-button").addEventListener("click", function() {
  logout();
});