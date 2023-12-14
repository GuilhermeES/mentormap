let form = document.getElementById('registrationForm');
let submitButton = form.querySelector('button[type="submit"]');
let fields = form.querySelectorAll('input, select');
let dataNascimentoField = form.querySelector('#dataNascimento');

function updateSubmitButton() {
    let allFieldsFilled = true;

    // Verifica se todos os campos estão preenchidos
    fields.forEach(function (field) {
        if (field.value.trim() === '') {
            allFieldsFilled = false;
        }
    });

    // Verifica se as senhas coincidem
    let password = form.querySelector('input[name="password"]').value;
    let confirmPassword = form.querySelector('input[name="password_confirmation"]').value;
    let passwordsMatch = password === confirmPassword;

    // Atualiza o estado do botão de envio
    submitButton.disabled = !(allFieldsFilled && passwordsMatch);
}

// Adiciona os ouvintes de eventos para atualizar o botão de envio
fields.forEach(function (field) {
    field.addEventListener('input', updateSubmitButton);
});

// Para campos de senha, verifique também ao perderem o foco
let passwordFields = form.querySelectorAll('input[type="password"]');
passwordFields.forEach(function (passwordField) {
    passwordField.addEventListener('blur', updateSubmitButton);
});

//Mascara no campo de data de nascimento
dataNascimentoField.addEventListener('input', function () {
    // Remove caracteres não numéricos
    let cleanedValue = dataNascimentoField.value.replace(/\D/g, '');

    // Adiciona as barras conforme o usuário digita
    if (cleanedValue.length > 2 && cleanedValue.length <= 4) {
        dataNascimentoField.value = cleanedValue.slice(0, 2) + '/' + cleanedValue.slice(2);
    } else if (cleanedValue.length > 4) {
        dataNascimentoField.value = cleanedValue.slice(0, 2) + '/' + cleanedValue.slice(2, 4) + '/' + cleanedValue.slice(4, 8);
    } else {
        dataNascimentoField.value = cleanedValue;
    }
})