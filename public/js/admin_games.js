var search_field = document.getElementById("game_search_field");
var curr_page = 1;
var timeout = null;


search_field.addEventListener("keyup", function () {
    clearTimeout(timeout);
    let value = this.value;
    console.log(value);
    timeout = setTimeout(function () {
        getGameList(curr_page, value, null);
    }, 500);
});

getGameList(1, null, null);

function getGameList(page, text_search) {
    curr_page = page;
    startLoader(document.getElementById("game-list"));

    sendSearchRequest(page, null, text_search, null, null, displayGames);
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
    template.classList.add("row");
    template.classList.add("mt-2");
    
    let listed = `<i class="fas fa-eye"></i>`

    if (!game.listed)
        listed = `<i class="fas fa-eye-slash"></i>`;

    template.innerHTML = 
            `
            <div class="col">` + game.id  +`</div>
            <a class="col-6" href="/products/`+ game.id +`">` + game.title  +`</a>
            <div class="col">` + listed  +`</div>
            <a class="col" href="/admin/products/`+ game.id +`/edit"> 
                <i class="fas fa-pencil-alt"></i> 
            </a>
            `;

    return template;
}
