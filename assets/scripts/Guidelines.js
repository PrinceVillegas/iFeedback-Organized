// assuming you have a checkbox with id "myCheckbox" and a button with id "ok-button"

const checkbox = document.getElementById("myCheckbox");
const button = document.querySelector('.ok-button');

checkbox.addEventListener("change", function() {
  console.log("Checkbox changed");
  if (this.checked) {
    button.classList.add("enabled");
    console.log("Enabled class added");
  } else {
    button.classList.remove("enabled");
    console.log("Enabled class removed");
  }
});


// TIMER

let time = 1; // time in seconds
let timerInterval;
let checkboxChecked = false;

function startTimer() {
    timerInterval = setInterval(function() {
      time--;
      document.getElementById("timer").innerText = time.toString().padStart(2, '0');
      if (time <= 0) {
        clearInterval(timerInterval);
        button.classList.add("timer-finished");
      }
    }, 1000); // decrement every 1 second
}

// start the timer when the page loads
window.addEventListener("load", function() {
  startTimer();
});

// check if checkbox is checked
checkbox.addEventListener("change", function() {
  if (this.checked) {
    checkboxChecked = true;
    // enable the OK button if timer is finished
    if (time <= 0) {
      button.classList.add("enabled");
    }
  } else {
    checkboxChecked = false;
    button.classList.remove("enabled");
  }
});

checkbox.addEventListener("change", function() {
    if (this.checked && time <= 0) {
      button.classList.add("enabled", "timer-finished");
    }
  });

// PROCEED TO NEXT PAGE

button.addEventListener("click", function() {
    if (this.classList.contains("enabled")) {
      // proceed to the next page
      window.location.href = "evaluateInstructors.php";
    }
  });