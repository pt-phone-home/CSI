const navBar = document.querySelector(".main-nav-logo-left");
const brandLogo = document.querySelector(".logo-img");

window.addEventListener("scroll", function() {
  if (window.pageYOffset >= 50) {
    navBar.classList += " small-nav";
    brandLogo.classList = " small-img";
  } else {
    navBar.classList = "main-nav-logo-left";
    brandLogo.classList = " logo-img";
  }
});
