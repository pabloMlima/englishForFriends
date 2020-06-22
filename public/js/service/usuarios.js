function requestNovoUsuario(form) {
    let cadastro;
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('_token', form[0].value)
    formData.append('name', form[1].value)
    formData.append('email', form[3].value)
    formData.append('password', form[4].value)
    formData.append('genre', form[6].value)
    xhr.open("POST", 'http://localhost:8000/api/usuarios/novo-cadastro', false);
    xhr.onload = function() {
        cadastro = JSON.parse(xhr.response);
    }
    xhr.send(formData);

    return cadastro;
}