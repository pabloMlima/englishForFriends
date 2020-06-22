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