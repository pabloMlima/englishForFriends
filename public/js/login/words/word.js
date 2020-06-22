gerarFrases();

function gerarFrases() {
    if ($("#btnRegister")) {
        $("#btnRegister").prop("disabled", true);
    }
    let frases = requestListFrases();
    let divQ = document.getElementById('questionsId');
    console.log(frases);
    divQ.innerHTML += '<div class="mrg-l-sm"><label><b>' + frases.questao[0].val_rob_tex_frase + '</b></label></div>';
    for (let i = 0; i < frases.opcaoRespostas.length; i++) {
        divQ.innerHTML += '<div class="mrg-l-md"><label>' + frases.opcaoRespostas[i].val_rob_tra_mensagem + '</label><input onclick="validateRegister(this.value)" name="password" value="' + frases.opcaoRespostas[i].validacao_robo_traducao_id + "-" + frases.questao[0].validacao_robo_text_id + '" type="radio" class="radio" /></div>'
    }
}

function registerModal() {
    $("#register").prop("disabled", false);
}