var pagination_set = false;

sendSearchRequest(1);

function sendSearchRequest(page) {
    startLoader(document.getElementById("list-loader"));
    sendAjaxRequest("get", "api/products/search?page=" + page, null, displayGames);
}

function displayGames() {
    let response = JSON.parse(this.responseText);
    total_pages = response.last_page;
    let gameList = response.data;
    let gameListElement = document.getElementById('game-list');

    gameListElement.innerHTML = "";

    for (const game of gameList) {
        gameListElement.appendChild(getGameTemplate(game));
    }

    if (!pagination_set){
        $('#list-links').twbsPagination({
            totalPages: response.last_page,
            visiblePages: 7,
            cssStyle: '',
            onInit: null,
            onPageClick: function (event, page) {
                sendSearchRequest(page);
            }
        });
        pagination_set = true;
    }
    stopLoader();
}

function getGameTemplate(game) {
    let template = document.createElement('article');

    template.innerHTML = 
    `<a class="row bg-dark b-shadow my-2" href="products/` + game.id + `">
        <div class="col-2 my-auto"><img src="storage/` +  game.images[0].path + `" class="my-1 b-shadow"
                style="max-width:80%;max-height:80%;">
        </div>
        <div class="col-4 m-auto">
            <div class="row">`
               + game.title +
           `</div>
            <div class="row"><span class="HomeNav-devInfo">`+ game.developers.name +`</span></div>

        </div>
        <div class="col-2 my-auto d-none d-md-block">` + game.launch_date + `</div>
        <div class="col-2 my-auto">
            <div class="radialProgressBar progress-70 mx-auto">
                <div class="overlay text-light">` + game.score + `</div>
            </div>
        </div>
        <div class="col-2 my-auto" align="right">` + game.price + `€</div>
    </a>`;
    return template;
}
