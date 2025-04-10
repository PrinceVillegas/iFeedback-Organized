// stars script
document.querySelectorAll(".rating").forEach((ratingElement) => {
  const ratingValue =
    parseInt(ratingElement.getAttribute("data-rating"), 10) || 0;
  const stars = ratingElement.querySelectorAll("li i");

  stars.forEach((star, index) => {
    if (index < ratingValue) {
      star.style.color = "gold";
    } else {
      star.style.color = "#ccc";
    }
  });
});

//duplicating carsd
var card = document.getElementById("card");
var container = document.querySelector(".cards-container");

//pang duplicate lang ng cards, pwedeng modify for backend or pwede rin tanggalin
for (let i = 0; i < 7; i++) {
  var clone = card.cloneNode(true);
  container.appendChild(clone);
}
