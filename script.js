// SWIPPERRRR//
var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
  loop: true
});
// ======================================================

let cari = document.getElementById("search");
let searchBar = document.getElementById('text');

cari.addEventListener('click', function () {
    searchBar.classList.toggle('show')
})


let menuToggle = document.querySelector('#togle-menu')
let nav = document.querySelector('nav ul')
menuToggle.addEventListener('click', function () {
  nav.classList.toggle('show')
})



const menuBtn = document.querySelector('.menu-btn');
let menuOpen = false;
menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;
  } else {
    menuBtn.classList.remove('open');
    menuOpen = false;
  }
});


