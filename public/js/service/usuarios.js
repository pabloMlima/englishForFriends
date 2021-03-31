var url_atual = window.location.href;
var expUrl = url_atual.split('/');
var URL_BASE = expUrl[0] + '//' + expUrl[2] + '/' + expUrl[3] + '/';

function requestNovoUsuario(form) {
    let cadastro;
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('_token', form[0].value)
    formData.append('name', form[2].value)
    formData.append('email', form[3].value)
    formData.append('password', form[4].value)
    formData.append('genre', form[6].value)
    xhr.open("POST", URL_BASE + 'api/usuarios/novo-cadastro', false);
    xhr.onload = function() {
        cadastro = JSON.parse(xhr.response);
    }
    xhr.send(formData);

    return cadastro;
}