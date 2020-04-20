function parallaxLoop() {
  var layer01 = document.querySelector("#layer01");
  var layer02 = document.querySelector("#layer02");
  var layer03 = document.querySelector("#layer03");
  var layer04 = document.querySelector("#layer04");
  var layer05 = document.querySelector("#layer05");
  var layer06 = document.querySelector("#layer06");
  var layer08 = document.querySelector("#layer08");
  var layer09 = document.querySelector("#layer09");

  window.addEventListener("DOMContentLoaded", scrollLoop, false);

  var xScrollPosition;
  var yScrollPosition;
  scrollLoop();
}
function setTranslate(xPos, yPos, el) {
  el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
}
function scrollLoop() {
  xScrollPosition = window.scrollX;
  yScrollPosition = window.scrollY;
  if (yScrollPosition < 500) {
    setTranslate(0, yScrollPosition * -0.4, layer01);
    setTranslate(0, yScrollPosition * -0.02, layer02);
    setTranslate(0, yScrollPosition * -0.7, layer03);
    setTranslate(0, yScrollPosition * -0.9, layer04);
    setTranslate(0, yScrollPosition * -0.3, layer05);
    setTranslate(0, yScrollPosition * -0.5, layer06);
  }
  if (yScrollPosition < 1500) {
    setTranslate(0, yScrollPosition * -0.1, layer08);
    setTranslate(0, yScrollPosition * 0.1, layer09);
  }
  if (yScrollPosition > 2650) {
    document.getElementById("logo-bottom").style.opacity = 1;
  } else {
    document.getElementById("logo-bottom").style.opacity = 0.1;
  }
  requestAnimationFrame(scrollLoop);
}
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
