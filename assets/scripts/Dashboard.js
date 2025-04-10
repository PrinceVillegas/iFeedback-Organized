sidebar.addEventListener('mouseenter', () => {
  boxes.forEach((box) => box.style.width = '367px'); 
});

sidebar.addEventListener('mouseleave', () => {
  boxes.forEach((box) => box.style.width = '400px'); 
});

function showQuiz() {
  document.getElementById("pop-up-miniQuiz1stQrt").showModal();
}

if (document.getElementById('show-popup').value == 'true') {
  document.getElementById('welldonemessage').showModal();
  setTimeout(function() {
      document.getElementById('welldonemessage').close();
  }, 3000); // close the dialog after 3 seconds
}
function closePopup() {
  document.getElementById('welldonemessage').close();
}
document.getElementById('welldonemessage').addEventListener('close', function() {
  document.getElementById('FeedbackBadgeAward').showModal(); 
});

