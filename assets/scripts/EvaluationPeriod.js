// Get the navigation buttons
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');

// Store the current month and year
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

// Function to generate the calendar
function generateCalendar() {
    const calendarTitle = document.getElementById('calendar-title');
    const calendarDays = document.getElementById('calendar-days');
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    calendarTitle.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    calendarDays.innerHTML = '';

    let dayOfWeek = new Date(currentYear, currentMonth, 1).getDay();
    let date = 1;
    let rows = Math.ceil((lastDate + dayOfWeek - 1) / 7);

    for (let i = 0; i < rows; i++) {
        for (let j = 0; j < 7; j++) {
            const dateCell = document.createElement('div');
            if (i === 0 && j < dayOfWeek) {
                dateCell.textContent = '';
            } else if (date > lastDate) {
                dateCell.textContent = '';
            } else {
                dateCell.textContent = date;
                const currentDate = new Date(currentYear, currentMonth, date);
                if (currentDate.toDateString() === new Date().toDateString()) {
                    dateCell.classList.add('highlight');
                }
                if (currentDate.getDay() === 0) {
                    dateCell.classList.add('sunday');
                }
                date++;
            }
            dateCell.style.gridRow = i + 1; /* add a row number */
            dateCell.style.gridColumn = j + 1; /* add a column number */
            calendarDays.appendChild(dateCell);
        }
    }
}

// Function to navigate to the previous month
function prevMonth() {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar();
}

// Function to navigate to the next month
function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar();
}

// Add event listeners to the navigation buttons
prevMonthButton.addEventListener('click', prevMonth);
nextMonthButton.addEventListener('click', nextMonth);

// Generate the initial calendar
generateCalendar();


var today = new Date();
var date = today.toLocaleString("default", { month: "long", day: "numeric", year: "numeric" });
document.getElementById("currentDate").value = date;

const createReminderButton = document.querySelector('.create-reminder');
const exitButton = document.querySelector('.exit-button');
const reminderCardContainer = document.querySelector('.reminder-card');
const controlsContainer = document.querySelector('.controls');

// Hide the controls container by default
controlsContainer.style.display = 'none';

createReminderButton.addEventListener('click', () => {
  reminderCardContainer.style.display = 'none';
  controlsContainer.style.display = 'block';
});

exitButton.addEventListener('click', () => {
  controlsContainer.style.display = 'none';
  reminderCardContainer.style.display = 'block';
});

