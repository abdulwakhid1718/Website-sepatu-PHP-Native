// SWIPPERRRR //
var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
  loop: true
});

// SEARCH BOX //
$('#text').hide()
$('#search').click(function () {
  $('#text').toggle("fast")
})

// MENU TOGGLE MOBILE RESPONSIVE //
function menuToggle() {
  let nav = document.querySelector('nav ul')
  nav.classList.toggle('show')
}

// FILTER KATEGORI
let parentProducts = document.querySelector('.items');
let products = document.querySelectorAll('.product');

function filterProducts() {
  let kategori = document.querySelector('.categories').children;
  for(let i=0; i<kategori.length; i++){
    kategori[i].onclick = function () {
      for(let x=0; x<kategori.length; x++){
          kategori[x].classList.remove('active');
      }
      this.classList.add('active');
      const indicatorKategori = this.getAttribute('data-kategori');
      let find = 0
      document.querySelector('.product-kosong').style.display = 'block';
      for(let z=0; z < products.length; z++) {
        products[z].style.transform = "scale(0)";
        products[z].style.display = "none";

        if ((products[z].getAttribute('data-kategori') == indicatorKategori) || indicatorKategori == "semua") {
          document.querySelector('.product-kosong').style.display = 'none';
          products[z].style.transform = "scale(1)";
          
            products[z].style.display = "block";
        }else{
          find = 1
        }
        // document.querySelector('.product-kosong').style.display = 'flex';
      }
      console.log(find);
    };
  }
}

new filterProducts()



