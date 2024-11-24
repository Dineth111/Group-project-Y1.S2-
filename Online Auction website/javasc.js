const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('nav-active');

    links.forEach((link) => {
        link.classList.toggle('toggle');
    });
});