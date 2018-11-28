document.addEventListener("DOMContentLoaded", () => {
  // Page Load Animation

  anime
    .timeline({
      easing: "easeOutExpo",
    })
    .add({
      targets: ".banner h1, .banner p, .banner .banner-button",
      right: ["50rem", "1rem"],
      opacity: ["0", "1"],
    })

    .add({
      targets: ".main-nav-logo-left",
      width: ["0", "100%"],
      opacity: ["0", "1"],
      offset: "-=500",
    })

    .add({
      targets: ".logo-img",
      opacity: ["0", "1"],
      offset: "-=500",
    });
});
