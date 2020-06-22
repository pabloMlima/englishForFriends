tinymce.init({
    selector: 'textarea#text',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#translation',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#textForum',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#translationForum',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#textPhaForum',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#translationPhaForum',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});
tinymce.init({
    selector: 'textarea#tips',
    max_height: 500,
    max_width: 500,
    min_height: 100,
    min_width: 400
});

function showCards() {
    if ($("#myCards").is(':visible')) {
        $("#myCards").hide('500');
    } else {
        $("#myCards").show('500');
        $("#cardsPublic").hide('500');
        $("#newsId").hide('500');
    }
}

function cardsPublicos() {
    if ($("#cardsPublic").is(':visible')) {
        $("#cardsPublic").hide('500');
    } else {
        $("#cardsPublic").show('500');
        $("#newsId").hide('500');
        $("#cardsDiv").hide('500');
    }
}