(function () {
  const second = 1000,
  minute = second * 60,
  hour = minute * 60,
  day = hour * 24;

  //command
  let today = new Date(),
  dd = String(today.getDate()).padStart(2, "0"),
  mm = String(today.getMonth() + 1).padStart(2, "0"),
  yyyy = today.getFullYear(),
  nextYear = yyyy + 1,
  dayMonth = "04/1/",
  evaluate = dayMonth + yyyy;
  
  today = mm + "/" + dd + "/" + yyyy;
  if (today > evaluate) {
    evaluate = dayMonth + nextYear;
  }
  
  const countDown = new Date(evaluate).getTime(),
  x = setInterval(function() {    
    const now = new Date().getTime(),
    distance = countDown - now;

    // assets/scripts/Countdown.js
    if (distance < 0) {
      document.getElementById("days").innerText = '00';
      document.getElementById("hours").innerText = '00';
      document.getElementById("minutes").innerText = '00';
      document.getElementById("seconds").innerText = '00';
      clearInterval(x); // also clear the interval to prevent further updates
    } else {
      document.getElementById("days").innerText = (Math.floor(distance / (day)) < 10 ? '0' : '') + Math.floor(distance / (day)),
      document.getElementById("hours").innerText = (Math.floor((distance % (day)) / (hour)) < 10 ? '0' : '') + Math.floor((distance % (day)) / (hour)),
      document.getElementById("minutes").innerText = (Math.floor((distance % (hour)) / (minute)) < 10 ? '0' : '') + Math.floor((distance % (hour)) / (minute)),
      document.getElementById("seconds").innerText = (Math.floor((distance % (minute)) / second) < 10 ? '0' : '') + Math.floor((distance % (minute)) / second);
    }
    
    //if countdown is finish
    if (distance < 0) {
        console.log("Countdown finished, enabling start button");
        document.querySelector(".countdownstartbtn").classList.add("enabled");
        document.querySelector(".countdownstartbtn img").src = "assets/svg/Unlock.svg"; 
        document.querySelectorAll(".custom-border").forEach(element => element.classList.add("finished"));
        document.querySelectorAll(".countdown-label").forEach(element => element.classList.add("finished"));

        document.querySelector(".countdownstartbtn").addEventListener("click", function() {
            window.location.href = "guidelines.php";
        });
        clearInterval(x);
    }
    //seconds
  }, 0)
}());