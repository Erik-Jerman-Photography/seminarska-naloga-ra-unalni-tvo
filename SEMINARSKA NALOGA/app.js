const meni = document.querySelector("#mobile-meni");
const meniLinks = document.querySelector(".navbar__meni");

meni.addEventListener("click", function () {
  meni.classList.toggle("is-active");
  meniLinks.classList.toggle("active");
});
