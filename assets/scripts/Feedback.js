document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("ratingForm");
  const requiredMessages = {};

  // Handle star rating selection
  document.querySelectorAll(".rating").forEach(ratingDiv => {
      const stars = ratingDiv.querySelectorAll(".star");
      const input = ratingDiv.querySelector("input[type='hidden']");

      stars.forEach(star => {
          star.addEventListener("click", function () {
              const ratingValue = this.getAttribute("data-value");
              input.value = ratingValue;

              // Hide "Rating required" message if rating is selected
              if (requiredMessages[input.name]) {
                  requiredMessages[input.name].style.display = "none";
              }

              // Update visual selection
              stars.forEach(s => s.classList.remove("selected"));
              for (let i = 0; i < ratingValue; i++) {
                  stars[i].classList.add("selected");
              }
          });
      });
  });

  // Form validation
  form.addEventListener("submit", function (event) {
      let valid = true;

      form.querySelectorAll("input[type='hidden'][name^='rating']").forEach(input => {
          if (!input.value) {
              valid = false;

              if (!requiredMessages[input.name]) {
                  const messageSpan = document.createElement("span");
                  messageSpan.style.color = "red";
                  messageSpan.style.fontSize = "15px";
                  messageSpan.innerText = "*Ratings required";

                  // Find the form-position div and place the message before it
                  const formPositionDiv = input.closest(".form-position" + input.name.replace("rating", ""));
                  if (formPositionDiv) {
                      formPositionDiv.insertAdjacentElement("afterbegin", messageSpan);
                  }

                  requiredMessages[input.name] = messageSpan;
                } else {
                    requiredMessages[input.name].style.display = "block";
                }
          }
      });

      // Prevent form submission if not valid
      if (!valid) {
          event.preventDefault();
      }
  });
});


//rating function

document.querySelectorAll('.rating-form').forEach(form => {
    form.addEventListener('click', function(event) {
        if (event.target.classList.contains('star')) {
            const stars = Array.from(form.querySelectorAll('.star'));
            const index = stars.indexOf(event.target);
            stars.forEach((star, i) => {
                if (i <= index) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
            form.querySelector('input[type="hidden"]').value = event.target.getAttribute('data-value');
        }
    });

    form.addEventListener('mouseover', function(event) {
        if (event.target.classList.contains('star')) {
            const stars = Array.from(form.querySelectorAll('.star'));
            const index = stars.indexOf(event.target);
            stars.forEach((star, i) => {
                if (i <= index) {
                    star.classList.add('hover');
                } else {
                    star.classList.remove('hover');
                }
            });
        }
    });

    form.addEventListener('mouseout', function() {
        form.querySelectorAll('.star').forEach(star => star.classList.remove('hover'));
    });
});
function redirectToDashboard() {
    setTimeout(function() {
        window.location.href = 'dashboard.php'; 
    }, 2000);
    document.querySelector('.welldone-position').style.display = 'block';
}


function validateFields() {
    const instructorName = document.getElementById('instructorName').value;
    const ratings = document.querySelectorAll('.rating input[type="hidden"]');
    const freeComment = document.getElementById('freeComment').value;
    let isValid = true;

    if (instructorName === '') {
        isValid = false;
    }

    ratings.forEach((rating) => {
        if (rating.value === '') {
            isValid = false;
        }
    });

    if (freeComment === '') {
        isValid = false;
    }

    return isValid;
}

const ratings = document.querySelectorAll('.rating');

ratings.forEach((rating) => {
 const stars = rating.querySelectorAll('.star');
 const input = rating.querySelector('input');

 if (input.type === 'hidden') { // only include hidden input fields
   stars.forEach((star) => {
     star.addEventListener('click', () => {
       const value = star.getAttribute('data-value');
       input.value = value;
       stars.forEach((s) => {
         s.classList.remove('active');
       });
       for (let i = 0; i < value; i++) {
         stars[i].classList.add('active');
       }
     });
   });
 }
});

function logout() {
    selectedInstructor = null;
    document.querySelectorAll(".instructor-card").forEach(function(card) {
      card.classList.remove("selected");
    });
    localStorage.removeItem("evaluatedInstructors");
  }
