const left = document.querySelector('.left');
const right = document.querySelector('.right');
const split = document.querySelector('.container');

left.addEventListener('mouseenter', () => {
  split.classList.add('hover-left');
});

left.addEventListener('mouseleave', () => {
  split.classList.remove('hover-left');
});

right.addEventListener('mouseenter', () => {
  split.classList.add('hover-right');
});


right.addEventListener('mouseleave', () => {
  split.classList.remove('hover-right');
});
