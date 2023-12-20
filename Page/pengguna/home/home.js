var carousel = document.querySelector(".carousel");
var prevButton = document.querySelector(".prev");
var nextButton = document.querySelector(".next");

var slideWidth = carousel.clientWidth / carousel.children.length;
var currentPosition = 0;
var maxPosition = carousel.children.length - 1;

prevButton.addEventListener("click", function () {
  if (currentPosition < 0) {
    currentPosition += slideWidth;
    carousel.style.transform = `translateX(${currentPosition}px)`;
  }
});

nextButton.addEventListener("click", function () {
  if (currentPosition > -maxPosition) {
    currentPosition -= slideWidth;
    carousel.style.transform = `translateX(${currentPosition}px)`;
  }
});
