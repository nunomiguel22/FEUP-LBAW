var customRange = document.getElementById("customRange1");
var search_field = document.getElementById("game_search_field");
var sort_field = document.getElementById("sort_by_field");
var curr_page = 1;
var timeout = null;

customRange.addEventListener("input", function () {
    var label = document.getElementById("customRangeLabel");
    label.innerHTML = "Under " + this.value + ",--€";
});

search_field.addEventListener("keyup", function () {
    clearTimeout(timeout);
    let value = this.value;
    timeout = setTimeout(function () {
        getGameList(curr_page, value, sort_field.value);
    }, 500);
});

sort_field.addEventListener("change", function () {
    getGameList(curr_page, search_field.value, this.value);
});

getGameList(1, null, null);

function getGameList(page, text_search, sort_by) {
    curr_page = page;
    startLoader(document.getElementById("game-list"));

    let category = search_params.get('category');
    if (text_search == null)
        text_search = search_params.get('text_search');
    if (sort_by == null)
        sort_by = search_params.get('sort_by');

    let max_price =  search_params.get('max_price');

    sendSearchRequest(page, category, text_search, max_price, sort_by, displayGames);
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

    new Paginator('list-links', response.last_page, curr_page,  getGameList);

    stopLoader();
}

function getGameTemplate(game) {
    let template = document.createElement('article');
    let score = (game.score / 5) * 100;

    let percent = Math.ceil(score / 5) * 5;


    template.innerHTML = 
    `<a class="row bg-dark b-shadow my-2" href="products/` + game.id + `">
        <div class="col-2 my-auto"><img src="storage/` +  game.images[0].path + `" class="my-1 b-shadow"
                style="max-width:80%;max-height:80%;">
        </div>
        <div class="col-4 m-auto">
            <div class="row">`
               + game.title +
           `</div>
            <div class="row"><span class="HomeNav-devInfo">`+ game.developer.name +`</span></div>

        </div>
        <div class="col-2 my-auto d-none d-md-block">` + game.launch_date + `</div>
        <div class="col-2 my-auto">
            <div class="radialProgressBar progress-`+ percent + ` mx-auto">
                <div class="overlay text-light">` + game.score + `</div>
            </div>
        </div>
        <div class="col-2 my-auto" align="right">` + game.price + `€</div>
    </a>`;
    return template;
}
