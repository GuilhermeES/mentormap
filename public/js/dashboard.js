let aside = document.querySelector('.aside');
let menu = document.querySelector('.navigation-dashboard__menu')

menu.addEventListener('click', () => {
    aside.classList.toggle('active')
})

let imagens = document.querySelectorAll(".imagem-preview");

if(imagens){
    imagens.forEach(function(imagem) {
        imagem.addEventListener("click", function() {
            let urlImagem = imagem.getAttribute("src");
            window.open(urlImagem, "_blank");
        });
    });
}
