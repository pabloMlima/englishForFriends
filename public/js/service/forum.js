function requestVisualizarText(form) {
    let texto;
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('_token', form.token)
    formData.append('forum_id', form.forum_id)
    xhr.open("POST", 'http://localhost:8000/api/forum/visualiza-texto', false);
    xhr.onload = function() {
        texto = JSON.parse(xhr.response);
    }
    xhr.send(formData);

    return texto;
}