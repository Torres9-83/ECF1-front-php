const button = document.querySelector(".secret");

button.addEventListener("click", () => {
  window.alert("Demande a Sean j'ai peur d'afficher une connerie ... ;)");
});

const article = document.querySelectorAll(".color");
const title = document.querySelectorAll(".hover");

article.forEach(function (e) {
  e.addEventListener("mouseover", () => {
    e.style.cursor = "pointer";
    e.style.backgroundColor = "rgb(25, 135, 84)";
    e.style.color = "white";
    e.childNodes[1].childNodes[1].style.color = "rgb(255, 193, 7)";
  });
});

article.forEach(function (e) {
  e.addEventListener("mouseout", () => {
    e.style.cursor = "pointer";
    e.style.background = "white";
    e.style.color = "black";
    e.childNodes[1].childNodes[1].style.color = "rgb(13, 110, 253)";
  });
});

// for (let index = 0; index < article.length; index++) {
//   article[index].addEventListener("mouseover", () => {
//     article[index].style.backgroundColor = "rgb(25, 135, 84)";
//     article[index].style.color = "white";
//     title[index].style.color = "orange";
//   });

//   article[index].addEventListener("mouseout", () => {
//     article[index].style.backgroundColor = "white";
//     article[index].style.color = "black";
//     title[index].style.color = "red";
//   });
// }
