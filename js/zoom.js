'use strict';

function zoom(e)
{
  e.preventDefault();

  let desktopMedia = window.matchMedia("(min-width: 1125px)");
  let tabletMedia = window.matchMedia("(min-width: 869px) and (max-width: 1124px)");



  const img = document.querySelector('#img');
  const result = document.querySelector('#zoom');
  const txt = document.querySelector('.art_picture > p');

  if(desktopMedia.matches) {    // Vérification du media query
    // Modifier le text sous la photo
    txt.textContent = "Cliquez à nouveau pour quitter le zoom.";

    // Ajuster les event listener une fois le zoom lancé
    img.removeEventListener("click", zoom);
    img.addEventListener("click", hide);

  } else if(tabletMedia.matches)   // Vérification du media query
  {
    // Modifier le text sous la photo
    txt.textContent = "Relachez pour quitter le zoom.";

    // Ajuster les event listener une fois le zoom lancé
    img.removeEventListener("touchstart", zoom);
    img.addEventListener("touchstart", hide);
    img.addEventListener("touchend", hide);
  }

  result.classList.remove("hidden");

  // Création de la lens
  let lens = document.createElement("div");
  lens.setAttribute("class", "zoom-lens");
  lens.setAttribute("id", "lens");
  lens.addEventListener("click", hide);

  img.parentElement.insertBefore(lens, img);

  // Calcul du ratio entre la div result et la lens
  let cx = result.offsetWidth / lens.offsetWidth;
  let cy = result.offsetHeight / lens.offsetHeight;

  // Afficher l'image dans le result
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";

  if(desktopMedia.matches) {    // Vérification du media query
    // Event listener si on déplace la souris
    lens.addEventListener("mousemove", moveLens);
    img.addEventListener("mousemove", moveLens);

  } else if(tabletMedia.matches)  // Vérification du media query
  {
    // Event listener tactile
    lens.addEventListener("touchmove", moveLens);
    img.addEventListener("touchmove", moveLens);
  }

  function moveLens(e)
  {
    let pos, x, y;
    e.preventDefault();

    // récupérer la position du curseur
    pos = getCursorPos(e);

    // Calculer la position de la lens
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);

    // Limiter la lens aux bords de l'image
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}

    // Positionner la lens (en tenant compte du padding "40")
    lens.style.left = x + 40 + "px";
    lens.style.top = y + 40 + "px";

    // Afficher le zoom correspondant a la lens
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }

  function getCursorPos(e)
  {
    let desktopMedia = window.matchMedia("(min-width: 1125px)");
    let tabletMedia = window.matchMedia("(min-width: 869px) and (max-width: 1124px)");

    let a, x = 0, y = 0;
    e = e || window.event;

    // Récuperer la position de l'image
    a = img.getBoundingClientRect();

    // Calculer la position du curseur par rapport à l'image
    if(desktopMedia.matches)
    {
      x = e.pageX - a.left;
      y = e.pageY - a.top;

    } else if (tabletMedia.matches)
    {
      let touch = e.touches[0] || e.changedTouches[0];

      x = touch.pageX - a.left;
      y = touch.pageY - a.top;
    }

    // Garder la position en cas de défilement de la page
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
};

function hide ()
{
  let desktopMedia = window.matchMedia("(min-width: 1125px)");
  let tabletMedia = window.matchMedia("(min-width: 869px) and (max-width: 1124px)");

  const lens = document.querySelector("#lens");
  const result = document.querySelector("#zoom");

  // Cacher les elements du zoom ou les afficher
  lens.classList.toggle("hidden");
  result.classList.toggle("hidden");

  // Chnager le texte en fonction de celui déja present
  const txt = document.querySelector('.art_picture > p');

  if (txt.textContent == "Cliquez sur l'image pour zoomer.") {

    if(desktopMedia.matches) {     // Vérification du media query
      txt.textContent = "Cliquez à nouveau pour quitter le zoom.";

    } else if(tabletMedia.matches) {    // Vérification du media query
      txt.textContent = "Relachez pour quitter le zoom.";
    }
  } else {
    txt.textContent = "Cliquez sur l'image pour zoomer.";
  }
}

document.addEventListener("DOMContentLoaded", function() {

  let desktopMedia = window.matchMedia("(min-width: 1125px)");
  let tabletMedia = window.matchMedia("(min-width: 869px) and (max-width: 1124px)");
  let mobileAppartMedia = window.matchMedia("(min-width: 868px)");

  if(mobileAppartMedia.matches)
  {
    const img = document.querySelector("#img");
    const verify = document.querySelector("#lens");

    if(desktopMedia.matches)
    {
      img.addEventListener("click", zoom);

    } else if (tabletMedia.matches)
    {
      img.addEventListener("touchstart", zoom);
    }
  }

});
