const track = document.querySelector('#track');
const logoSlide = track.querySelector('.logo-slide');

let scrollPosition = 0;
const speed = 1;
let isPlaying = true;
let animationFrameId = null;

function scroll() {
  if (!isPlaying) return;

  scrollPosition -= speed;
  const slideWidth = logoSlide.offsetWidth;
  if (Math.abs(scrollPosition) >= slideWidth) {
    scrollPosition += slideWidth;
  }
  track.style.transform = `translateX(${scrollPosition}px)`;
  animationFrameId = requestAnimationFrame(scroll);
}

track.addEventListener('mouseenter', () => {
  isPlaying = false;
  if (animationFrameId) {
    cancelAnimationFrame(animationFrameId);
  }
});

track.addEventListener('mouseleave', () => {
  isPlaying = true;
  scroll();
});

scroll();
