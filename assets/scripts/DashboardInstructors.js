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