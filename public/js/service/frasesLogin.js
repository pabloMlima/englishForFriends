function requestListFrases() {
    let frases;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", 'http://localhost:8000/api/login/frases-list-validation', false);
    xhr.onload = function() {
        frases = JSON.parse(xhr.response);
    }
    xhr.send();

    return frases;
}