function opImg() {
    if ($("#text").is(':visible')) {
        $("#text").hide('500');
        $("#opImgOrg").show('500');
        //document.getElementById('areaText').value = '';
    } else {
        $("#opImgOrg").hide('500');
        $("#text").show('500');
        //document.getElementById('img').value = '';
    }
}

function opImgTranslation() {
    if ($("#translation").is(':visible')) {
        $("#translation").hide('500');
        $("#opImgOrgTransl").show('500');
        //document.getElementById('areaTextTansl').value = '';
    } else {
        $("#opImgOrgTransl").hide('500');
        $("#translation").show('500');
        //document.getElementById('imgTranslation').value = '';
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        $("#imgpreview").show('500');
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgpreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    $("#imgDefaultAvatar").hide('500');
}
$("#img").change(function() {
    readURL(this);
});

function readURLTranslate(input) {
    if (input.files && input.files[0]) {
        $("#imgtranslpreview").show('500');
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgtranslpreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#imgTranslation").change(function() {
    readURLTranslate(this);
});

function previewImgAvat(input) {
    alert('foi');
    if (input.files && input.files[0]) {
        $("#imgAvatarPreview").show('500');
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgAvatarPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#imgDefaultAvatar").hide('500');
    }
}
$("#avatar").change(function() {
    previewImgAvat(this);
});