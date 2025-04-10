const headerCheckbox = document.querySelector('.thCheckbox input[type="checkbox"]');

const checkboxes = document.querySelectorAll('table input[type="checkbox"]:not(.thCheckbox input[type="checkbox"])');

headerCheckbox.addEventListener('change', function() {
  checkboxes.forEach(checkbox => {
    checkbox.checked = this.checked;
    const row = checkbox.closest('tr');
    row.classList.toggle('selected', this.checked);
  });
  updateSelectedCount();
});

const numberOfSelectedElement = document.querySelector('.numberOfSelected p');

numberOfSelectedElement.style.display = 'none';

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function() {
    const row = this.closest('tr');
    row.classList.toggle('selected', this.checked);
    updateSelectedCount();
  });
});

function updateSelectedCount() {
  const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
  numberOfSelectedElement.textContent = `${selectedCount} selected`;
  numberOfSelectedElement.style.display = selectedCount === 0 ? 'none' : 'block';
}


const statusCells = document.querySelectorAll('td:nth-child(6)');

statusCells.forEach(cell => {
  if (cell.textContent === 'Inactive') {
    cell.classList.add('inactive');
  } else if (cell.textContent === 'Active') {
    cell.classList.add('active');
  }
});

statusCells.forEach(cell => {
    if (cell.textContent === 'Part Time') {
      cell.classList.add('partTime');
    } else if (cell.textContent === 'Full Time') {
      cell.classList.add('fullTime');
    }
  });