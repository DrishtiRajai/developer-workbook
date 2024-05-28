const share = document.querySelector(".card__bottom__button");
const popup = document.querySelector(".card__popup");

let isOpen = false;

share.addEventListener("click", () => {
  isOpen = !isOpen;
  if (isOpen) {
    popup.style.display = "flex";
  } else {
    popup.style.display = "none";
  }
});
