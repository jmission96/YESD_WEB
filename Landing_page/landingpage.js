const slideContainer = document.getElementById("slide");
const slides = slideContainer.querySelectorAll("img");
const slideCount = slides.length;
let currentIndex = 0;

const updateSlide = () => {
  slideContainer.scrollTo({
    left: currentIndex * slideContainer.clientWidth,
    behavior: "smooth",
  });
};

document.getElementById("arrow_left").addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + slideCount) % slideCount;
  updateSlide();
});

document.getElementById("arrow_right").addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % slideCount;
  updateSlide();
});
