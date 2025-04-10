function toggleMessage(id) {
    var message = document.getElementById(id);
    message.classList.toggle("expanded");
  }

  function toggleDropdown(event) {
    const dropdown = document.getElementById('dropdown-menu');
    if (dropdown.style.display === 'block') {
      dropdown.style.display = 'none';
    } else {
      dropdown.style.display = 'block';
      dropdown.style.top = event.clientY + 'px';
      dropdown.style.left = event.clientX + 'px';
    }
  }

/*************  ✨ Codeium Command ⭐  *************/
/**
 * Displays the reply modal by setting its display style to 'block'.
 */

/******  cdc6dc4d-da8d-41f3-8713-71da00c213e9  *******/
  function openReplyModal() {
    document.getElementById('reply-modal').style.display = 'block';
  }

  function closeReplyModal() {
    document.getElementById('reply-modal').style.display = 'none';
  }

  function toggleEscalateMenu(event) {
    const escalateMenu = document.getElementById('escalate-menu');
    if (escalateMenu.style.display === 'block') {
      escalateMenu.style.display = 'none';
    } else {
      escalateMenu.style.display = 'block';
      escalateMenu.style.top = event.clientY + 'px';
      escalateMenu.style.left = event.clientX + 'px';
    }
  }

  const tabs = document.querySelectorAll('.tab');

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      tabs.forEach((t) => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });