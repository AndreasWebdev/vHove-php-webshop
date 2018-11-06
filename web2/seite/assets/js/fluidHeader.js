var header = document.querySelector("header");
var headerSpace = document.querySelector(".headerSpace");

// Make headerSpace the height of the header
headerSpace.style.height = header.offsetHeight + "px";

window.onscroll = function() {
  if(document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
    header.classList.add("headerFixed");
  } else {
    header.classList.remove("headerFixed");
  }
};
