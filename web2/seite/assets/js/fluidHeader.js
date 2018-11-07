var header = document.querySelector("header");
var headerSpace = document.querySelector(".headerSpace");

// Make headerSpace the height of the header
headerSpace.style.height = header.offsetHeight + "px";

window.onscroll = function() {
  if(document.body.scrollTop > header.offsetHeight || document.documentElement.scrollTop > header.offsetHeight) {
    header.classList.add("headerFixed");
  } else {
    header.classList.remove("headerFixed");
  }
};
