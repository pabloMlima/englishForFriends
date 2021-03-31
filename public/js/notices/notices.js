function newYorkTimes() {
    let noticias;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.nytimes.com/svc/topstories/v2/world.json?api-key=sNtUC6xaz5dlTqNvcfPrL9ZGAVOjcrvU");
    xhr.onload = function(data) {
        noticias = JSON.parse(xhr.response);
        createCards(noticias);
    }
    xhr.send();
}

function createCards(noticias) {
    if ($('#newsId').is(":visible")) {
        $('#newsId').hide('500');
    } else {
        $('#newsId').show('500');
    }
    let divInn = '';
    let divCardNews = '<div class="card c-news" >';
    let divCardNewsImgIni = '<img class="img-news" src="';
    let divCardNewsImgFim = ' ">'
    let divCardNewsBodyIni = '<div class="card-body b-card-news">'
    let divBtnLinkIni = '<a target="_blank" type="button"  href=" ';
    let divBtnLinkFim = '">';
    let divBtnLinkFimAy = '</a>'
    let divCardNewsBodyFim = '</div>'
    let divCardNewsFim = '</div>';
    let divCardFooterIni = '<div class="card-footer c-footer c-white t-more">More';
    let divCardFooterFim = '</div>'
    let element = document.getElementById('newsId');

    for (let i = 0; i < noticias.results.length; i++) {

        divInn += divCardNews + divCardNewsImgIni + noticias.results[i].multimedia[0].url + divCardNewsImgFim +
            divCardNewsBodyIni + noticias.results[i].abstract + divCardNewsBodyFim + divBtnLinkIni + noticias.results[i].short_url +
            divBtnLinkFim + divCardFooterIni + divCardFooterFim + divBtnLinkFimAy + divCardNewsFim;
    }
    element.innerHTML = divInn;
}