function checkEmail(email) {
    var filter = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
    let btnRegister = document.getElementById('btnRegister');
    if (btnRegister) {
        $("#btnRegister").prop("disabled", true);
    }
    if (!filter.test(email)) {
        $("#eInvalid").show('500');
        $("#email").addClass('c-red');
        $("#login").prop("disabled", true);
        email.focus;
        return false;
    } else {
        $("#eInvalid").hide('500');
        $("#login").prop("disabled", false);
        $("#email").removeClass('c-red');
    }
}

function checkPassword(pass) {
    let passAgain = document.getElementById('passwordagain');
    if (pass != passAgain) {
        alert("diferentes")
    } else {
        alert("iguais")
    }
}

function validateRegister(val) {
    let formCard = $('#register').serializeArray();
    let token = formCard[0].value;
    let btnRegister = document.getElementById('register');
    if (btnRegister) {
        $("#btnRegister").prop("disabled", false);
    }
    let expF = val.split('-');
    let dados = {
        'token': token,
        'text': expF[1],
        'traducao': expF[0]
    };

    let validation = requestValidReq(dados);
    let divQues = document.getElementById('questionsId');
    if (validation.status == 0) {
        divQues.innerHTML = '<label class="mrg-l-sm r-color">' + validation.message + '</label>';
        setTimeout(() => {
            divQues.innerHTML = '';
            gerarFrases();
        }, 3000)
    } else {
        $("#btnRegister").prop("disabled", false);
    }
}

function requestValidReq(dados) {
    let validation;
    let formData = new FormData();
    formData.append("_token", dados.token);
    formData.append("text_id", dados.text);
    formData.append("traducao_id", dados.traducao);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'http://localhost:8000/api/login/validation-frase', false);
    xhr.onload = function() {
        validation = JSON.parse(xhr.response);
    }
    xhr.send(formData);
    return validation;
}