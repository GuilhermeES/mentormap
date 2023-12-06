let aside = document.querySelector('.aside');
let menu = document.querySelector('.navigation-dashboard__menu')

menu.addEventListener('click', () => {
    aside.classList.toggle('active')
})