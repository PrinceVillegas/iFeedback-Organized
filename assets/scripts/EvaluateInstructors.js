let selectedInstructor = null;

document.querySelectorAll(".instructor-card").forEach(function(card) {
  card.addEventListener("click", function() {
    document.querySelectorAll(".instructor-card").forEach(function(otherCard) {
      if (otherCard !== card) otherCard.classList.remove("selected");
    });
    card.classList.add("selected");
    selectedInstructor = card;
    document.querySelector(".ok-button").classList.add("enabled");
    document.querySelector(".ok-button").disabled = false;
    card.style.backgroundColor = "";
    var evaluatedInstructors = localStorage.getItem("evaluatedInstructors");
    if (evaluatedInstructors !== null) {
      var instructors = evaluatedInstructors.split(",");
      if (instructors.includes(card.id)) {
        card.style.pointerEvents = "none";
      }
    }
  });
});

document.addEventListener("DOMContentLoaded", function() {
  var evaluatedInstructors = localStorage.getItem("evaluatedInstructors");
  if (evaluatedInstructors !== null) {
    var instructors = evaluatedInstructors.split(",");
    document.querySelectorAll(".instructor-card").forEach(function(card) {
      if (instructors.includes(card.id)) {
        card.classList.add("evaluated");
      }
    });
  }
});

function selectInstructor(instructorID) {
  document.getElementById("instructorId").value = instructorID;
  console.log("Instructor ID set to: " + document.getElementById("instructorId").value);
  var instructorCards = document.querySelectorAll(".instructor-card");
  instructorCards.forEach(function(card) {
    card.classList.remove("selected");
  });
  var instructorCard = document.getElementById("instructor-" + instructorID);
  instructorCard.classList.add("selected");
}

function okForm() {
  var instructorCard = document.querySelector(".instructor-card.selected");
  if (instructorCard === null) {
    alert("Please select an instructor");
    return;
  }
  var evaluatedInstructors = localStorage.getItem("evaluatedInstructors");
  if (evaluatedInstructors !== null) {
    var instructors = evaluatedInstructors.split(",");
    if (!instructors.includes(instructorCard.id)) {
      instructors.push(instructorCard.id);
      localStorage.setItem("evaluatedInstructors", instructors.join(","));
    }
  } else {
    localStorage.setItem("evaluatedInstructors", instructorCard.id);
  }

  document.getElementById("instructorForm").submit();
}

document.querySelector(".ok-button").addEventListener("click", function() {
  okForm();
});

function logout() {
  selectedInstructor = null;
  document.querySelectorAll(".instructor-card").forEach(function(card) {
    card.classList.remove("selected");
  });
  localStorage.removeItem("evaluatedInstructors");
}