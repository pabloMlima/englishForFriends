function requestVisualizarText(form) {
    let texto;
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('_token', form.token)
    formData.append('forum_id', form.forum_id)
    xhr.open("POST", URL_BASE + 'api/forum/visualiza-texto', false);
    xhr.onload = function() {
        texto = JSON.parse(xhr.response);
    }
    xhr.send(formData);

    return texto;
}

function requestAddFavoritos(form) {
    let retorno;
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('_token', form.token)
    formData.append('forum_id', form.forum_id)
    formData.append('token_usuario', form.token_usuario)
    xhr.open("POST", URL_BASE + 'api/forum/salva-favoritos-conteudo', false);
    xhr.onload = function() {
        retorno = JSON.parse(xhr.response);
    }
    xhr.send(formData);

    return retorno;
}