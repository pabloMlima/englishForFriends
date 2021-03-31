function novoCard() {
    let public = 0;
    let formCard = $('#formCard').serializeArray();
    //let imgText = document.getElementById('img').files[0];
    // let imgTranslate = document.getElementById('imgTranslation').files[0];
    console.log(formCard);
    let form = {
        // 'imgText': imgText,
        //'imgTranslate': imgTranslate,
        '_token': formCard[0].value,
        'texto': formCard[1].value,
        'translation': formCard[2].value,
    };
    requestNovoCard(form);
}

function requestNovoCard(data) {
    let xhr = new XMLHttpRequest();
    var formData = new FormData();
    //formData.append('imgText', data.imgText)
    //formData.append('imgTranslategText', data.imgTranslate)
    formData.append('_token', data._token)
    formData.append('texto', data.texto)
    formData.append('translation', data.translation)
        //formData.append('publico', data.publico)

    xhr.open("POST", URL_BASE + '/cards/cadastrar', false);
    xhr.onload = function() {
        if (xhr.response == 1) {
            $('#successCard').show('500');
            setTimeout(() => {
                $('#successCard').hide('500');
            }, 5000);
        } else {
            $('#errorCard').show('500');
            setTimeout(() => {
                $('#errorCard').hide('500');
            }, 5000);
        }
        $("#imgpreview").hide('500');
        $("#imgtranslpreview").hide('500');
        document.getElementById("formCard").reset();
    }
    xhr.send(formData);
}

function teste() {
    tinymce.util.XHR.send({
        url: 'someurl',
        success: function(text) {
            console.debug(text);
        }
    });

}