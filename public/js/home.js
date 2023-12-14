function scrollToAnchor(anchorId) {
    const targetElement = document.getElementById(anchorId);

    if (targetElement) {
        targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

document.querySelectorAll('.nav-link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        scrollToAnchor(targetId);
    });
});

//Formata input de telefone no formulario de contato
function formatarTelefone(input) {
    let phoneNumber = input.value.replace(/\D/g, '');

    if (phoneNumber.length >= 2) {
        input.value = `(${phoneNumber.slice(0, 2)}`;
    }
    if (phoneNumber.length > 2) {
        input.value += `) ${phoneNumber.slice(2, 7)}`;
    }
    if (phoneNumber.length > 7) {
        input.value += `-${phoneNumber.slice(7, 11)}`;
    }
}