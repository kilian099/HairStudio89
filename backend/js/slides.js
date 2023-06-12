// JavaScript code for testimonial slider animation
var sliderContainer = document.querySelector('.slider-container');
var slides = document.querySelectorAll('.slide');
var slideIndex = 0;

function showSlide() {
  // Hide all slides
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
  }

  // Show the current slide
  slides[slideIndex].style.display = '';

  // Increment slide index
  slideIndex++;

  // Reset slide index if it exceeds the number of slides
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  }
}

// Call the showSlide function initially
showSlide();

// Set the interval to switch between slides every 5 seconds (5000 milliseconds)
setInterval(showSlide, 5000);