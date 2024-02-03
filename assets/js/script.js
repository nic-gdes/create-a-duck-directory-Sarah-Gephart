// declare references (i.e., the button and ul)

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

// add the click function with a toggle so that the hamburger can toggle the hidden menu

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
})