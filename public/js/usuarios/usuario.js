let alertS = '<div class="alert alert-success" role="alert"><strong id="msgAlertS"></strong></div>';
let alertE = '<div class="alert alert-danger" role="alert"><strong id="msgAlertS"></strong></div>';

function novoUsuario() {
    let form = $('#register').serializeArray();
    let api = requestNovoUsuario(form);
    let divAlert = document.getElementById('alertCadastro');
    let retornoAlert = '';
    let msgs = '';
    for (let i = 0; i < api.messages.length; i++) {
        msgs += api.messages[i] + ', ';
    }
    $("#alertCadastro").show('500');
    if (api.result == 0) {
        retornoAlert = '<div class="alert alert-danger" role="alert"><strong>' + msgs + '</strong></div>'
    }
    if (api.result == 1) {
        retornoAlert = '<div class="alert alert-success" role="alert"><strong>' + msgs + '</strong></div>'
        form.reset();
    }
    divAlert.innerHTML = retornoAlert;
    setTimeout(() => {
        $("#alertCadastro").hide('500');
    }, 7000);
}