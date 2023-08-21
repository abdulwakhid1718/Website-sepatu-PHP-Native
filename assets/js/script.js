// SWIPPERRRR //
var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
});

// SWIPER DETAIL PRODUCT //
var swiper1 = new Swiper(".detailSwiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// SEARCH BOX //
$("#text").hide();
$("#search").click(function () {
  $("#text").toggle("fast");
});

// MENU TOGGLE MOBILE RESPONSIVE //
function menuToggle() {
  let nav = document.querySelector("nav ul");
  nav.classList.toggle("show");
}

// SEARCH PRODUCT //
// function cariProduk(param) {
//   $('#input-cari').keyup(function () {
//     let products = param != "semua" ? document.querySelectorAll(`.product[data-kategori = "${param}"]`) : document.querySelectorAll(`.product`);
//     for (let i = 0; i < products.length; i++) {
//       let element = products[i].getElementsByTagName("strong")[0];
//       let txt = element.textContent || element.innerText;
//       console.log(txt);
//       if (txt.toUpperCase().indexOf($('#input-cari').val().toUpperCase()) > -1) {
//         products[i].style.display = ""
//       }else{
//         products[i].style.display = "none"
//       }
//     }

//   })
// }

// FILTER KATEGORI //
function filterProducts() {
  let products = document.querySelectorAll(".product");
  let kategori = document.querySelectorAll(".kategori");
  for (let i = 0; i < kategori.length; i++) {
    kategori[i].onclick = function () {
      for (let x = 0; x < kategori.length; x++) {
        kategori[x].classList.remove("active");
      }
      const indicatorKategori = this.getAttribute("data-kategori");
      $(this).addClass("active");

      document.querySelector(".product-kosong").style.display = "block";
      for (let z = 0; z < products.length; z++) {
        products[z].style.transform = "scale(0)";
        products[z].style.display = "none";
        if (
          products[z].getAttribute("data-kategori") == indicatorKategori ||
          indicatorKategori == "semua"
        ) {
          document.querySelector(".product-kosong").style.display = "none";
          products[z].style.transform = "scale(1)";
          products[z].style.display = "block";
        }
      }
    };
  }
}

new filterProducts();
$(".product").attr("data-aos", "zoom-in-up");

let varianProduct = document.querySelector(".varian-color");
let span = varianProduct.querySelectorAll(".color");
let input = document.querySelectorAll(".varian-color input");
for (let i = 0; i < span.length; i++) {
  let el = span[i];
  const atributeColor = input[i].value;
  el.style.backgroundColor = atributeColor;
}
