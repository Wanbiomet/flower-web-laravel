const slides = document.querySelectorAll('.slide')
const navLink = document.querySelectorAll('.nav__mobile-list > li')
const right = document.querySelector('.bx-chevron-right')
let mybutton = document.getElementById("myBtn");
const toggleMenu = document.querySelector('.menu');
const nav_Moblie = document.querySelector('.nav__mobile');
const over_lay = document.querySelector('.over_lay')
navLink.forEach(item => {
  item.addEventListener('click', items=>{
    const subNav = items.target.parentNode.querySelector('.nav__mobile-submenu')
    subNav.classList.toggle('active')
  })
})
// Scroll To Top
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
let currSlide = 0

nextSlide = () => currSlide = currSlide + 1 === slides.length ? 0 : currSlide + 1

showSlide = () => {


    slides[currSlide].classList.add('active')
}

showSlide()

setInterval(() => {
    const slideActive = document.querySelector('.slide.active')
    slideActive.classList.remove('active')

    nextSlide()
    showSlide()
}, 3000)





function menuToggle() {
  toggleMenu.classList.toggle('active')
}




