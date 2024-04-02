const hamburger = document.querySelector('#header .nav-bar .hamburger');
const mobileMenu = document.querySelector('#header .nav-bar .nav-list ul');
const header = document.querySelector('#header .header');
const logo = document.querySelector('#header .brand img');
const selectors = document.querySelectorAll('#header .nav-list ul li a');

selectors.forEach(selected => {
    selected.addEventListener('click', e => {
        if(mobileMenu.classList.contains('active')){
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        }
    });
});

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
    var scrollPosition = window.scrollY;
    if(scrollPosition > 50){
        header.style.backgroundColor = "#29323c";
        logo.style.width = "65%"; /* Diminui o tamanho do logo */
    } else {
        header.style.backgroundColor = "transparent";
        logo.style.width = "100%"; /* Restaura o tamanho do logo */
    }
});