function requestListFrases() {
    let frases;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", URL_BASE + 'api/login/frases-list-validation', false);
    xhr.onload = function() {
        frases = JSON.parse(xhr.response);
    }
    xhr.send();

    return frases;
}