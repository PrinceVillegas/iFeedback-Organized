// Student Engagement Graph
function updateDonutChart(percentage) {
  const donutChart = document.querySelector('.donut-chart');
  const donutChartSpan = document.querySelector('.donut-chart span');
  donutChartSpan.textContent = `${percentage}%`;
  const gradient = `conic-gradient(#41b8d5 ${percentage}%, #ccc ${percentage}%)`;
  donutChart.style.backgroundImage = gradient;
}
//percent manipulator
updateDonutChart(90);

//Calendarfunction generateCalendar() {
  function generateCalendar() {
    const calendarTitle = document.getElementById('calendar-title');
    const calendarDays = document.getElementById('calendar-days');
    const today = new Date();
    const month = today.getMonth();
    const year = today.getFullYear();
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    calendarTitle.textContent = `${monthNames[month]} ${year}`;

    calendarDays.innerHTML = '';

    let dayOfWeek = new Date(year, month, 1).getDay();
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
                const currentDate = new Date(year, month, date);
                if (currentDate.getFullYear() === today.getFullYear() &&
                    currentDate.getMonth() === today.getMonth() &&
                    currentDate.getDate() === today.getDate()) {
                  dateCell.classList.add('highlight');
                }
                if (currentDate.getDay() === 0) {
                    dateCell.classList.add('sunday');
                }
                date++;
            }
            dateCell.style.gridRow = i + 1; 
            dateCell.style.gridColumn = j + 1; 
            calendarDays.appendChild(dateCell);
        }
    }
}
generateCalendar();


// Announcement dialog
const announcementDialog = document.getElementById('announcementDialog');
const announcementContent = document.getElementById('announcementContent');
const createAnnouncementButton = document.getElementById('announcementContent');
const createAnnouncementContainer = document.getElementById('createAnnouncencement');
const announcementView = document.getElementById('announcementview');
const createAnnouncementButtonDialogViewer = document.getElementById('createAnnouncementButtonDialogViewer');

// Add event listeners to the announcement content and create announcement button
announcementContent.addEventListener('click', () => {
  announcementView.showModal();
  createAnnouncementContainer.close();
});

createAnnouncementButton.addEventListener('click', () => {
  announcementView.showModal();
});

// Add event listeners to close the dialogs
document.getElementById('announcementview-close').addEventListener('click', () => {
  announcementView.close();
});

document.getElementById('createAnnouncencement-close').addEventListener('click', () => {
  createAnnouncementContainer.close();
});

createAnnouncementButtonDialogViewer.addEventListener('click', () => {
  createAnnouncementContainer.showModal();
});

const createAnnouncementPositionViewer = document.getElementById('createAnnouncementpositionviewer');

createAnnouncementPositionViewer.addEventListener('click', () => {
  announcementView.close();
  createAnnouncementContainer.showModal();
});

const anonymousQueriesSum = document.getElementById('anonymousQueriesSum');
const anonymousQueriesSummaryDialog = document.getElementById('anoymousQueriesSummary');

anonymousQueriesSum.addEventListener('click', () => {
  anonymousQueriesSummaryDialog.showModal();
  AQSNewviewContainer.style.display = 'block';
  AQSOldViewContent.style.display = 'none';
  newButton.classList.add('active');
  oldButton.classList.remove('active');
});

const oldButton = document.getElementById('oldButton');
const newButton = document.getElementById('newButton');
const AQSOldViewContent = document.getElementById('AQSOldViewContent');
const AQSNewviewContainer = document.getElementById('AQSNewviewContainer');

oldButton.addEventListener('click', () => {
  AQSOldViewContent.style.display = 'block';
  AQSNewviewContainer.style.display = 'none';
  oldButton.classList.add('active');
  newButton.classList.remove('active');
});

newButton.addEventListener('click', () => {
  AQSOldViewContent.style.display = 'none';
  AQSNewviewContainer.style.display = 'block';
  newButton.classList.add('active');
  oldButton.classList.remove('active');
});

const announcementviewCloseButton = document.getElementById('announcementview-close');

announcementviewCloseButton.addEventListener('click', () => {
  anonymousQueriesSummaryDialog.close();
});

function closeAnnouncementView() {
    document.getElementById('announcementview').close();
}