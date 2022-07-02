let cari = document.getElementById("search");
let searchBar = document.getElementById('text');

cari.addEventListener('click', function () {
    searchBar.classList.toggle('show')
    console.log("asdasd");
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