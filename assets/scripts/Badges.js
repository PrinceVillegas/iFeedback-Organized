
const earnedButton = document.getElementById('earnedButton');
const lockedButton = document.getElementById('lockedButton');
const earnedBadgesContainer = document.getElementById('earnedBadgesContainer');
const lockedBadgesContainer = document.getElementById('lockedBadgesContainer');

earnedButton.addEventListener('click', () => {
  earnedBadgesContainer.style.display = 'block';
  lockedBadgesContainer.style.display = 'none';
  earnedButton.classList.add('active');
  lockedButton.classList.remove('active');
});

lockedButton.addEventListener('click', () => {
  earnedBadgesContainer.style.display = 'none';
  lockedBadgesContainer.style.display = 'block';
  lockedButton.classList.add('active');
  earnedButton.classList.remove('active');
});