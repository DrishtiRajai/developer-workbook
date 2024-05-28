const lightbox = document.createElement("div");
lightbox.id = "lightbox";
document.body.appendChild(lightbox);

//Select every single image in the gallery
const img = document.querySelectorAll("img");
img.forEach((image) => {
  image.addEventListener("click", (e) => {
    lightbox.classList.add("active");
    const img = document.createElement("img");
    img.src = image.src;
    //Code to avoid adding up of second child while first child is active in the lightbox
    while (lightbox.firstChild) {
      lightbox.removeChild(firstChild);
    }
    lightbox.appendChild(img);
  });
});

//To remove the image from the lightbox when any other area is clicked
lightbox.addEventListener("click", (e) => {
  if (e.target !== e.currentTarget) return;
  lightbox.classList.remove("active");
});
