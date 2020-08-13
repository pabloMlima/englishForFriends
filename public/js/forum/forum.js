function visualizarVideo(link, id) {
    console.log(link)
    let div = document.getElementById('frameYoutube' + id);
    let frame = '<iframe class="youtubeIfr" width="100%" height="400px" src="' + link + '"></iframe>';
    div.innerHTML = frame;
}

function stopVideo() {
    $('.youtubeIfr').each(function() {
        $(this).stopVideo();
    });
}

function visualizarText(id) {
    let token = formApp();
    let form = {
        'forum_id': id,
        'token': token
    };
    let dados = requestVisualizarText(form);
    document.getElementById('textV').innerHTML = dados[0].for_con_texto;
    document.getElementById('translateV').innerHTML = dados[0].for_con_traducao;
}

function formApp() {
    let form = $('#formApp').serializeArray();
    return form[0].value;
}

function showTranslateForum() {
    if ($("#translateDiv").is(':visible')) {
        $("#translateDiv").hide('500');
    } else {
        $("#translateDiv").show('500');
    }
}

function adicionarFavoritos(id) {
    let tokenUsuario = document.getElementById('tokenusuario').value;
    let token = formApp();
    let form = {
        'forum_id': id,
        'token': token,
        'token_usuario': tokenUsuario
    };
    let reqApi = requestAddFavoritos(form);
    console.log('reqApi.status: ' + reqApi.status)
    if ((reqApi.delete == 0) && (reqApi.status == 1)) {
        $("#fav" + id).addClass("y-color");
    }
    if ((reqApi.delete == 0) && (reqApi.status == 0)) {
        $("#fav" + id).addClass("y-red");
    }
    if ((reqApi.delete == 1) && (reqApi.status == 0)) {
        $("#fav" + id).removeClass("y-red");
        $("#fav" + id).removeClass("y-color");
        $("#fav" + id).addClass("y-white");
    }

    console.log(reqApi);
}