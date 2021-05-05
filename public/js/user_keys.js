var pagination_set = false;

getKeyList(1);


function getKeyList(page) {
    let params = { page: page };
    let url_params = encodeForAjax(params);

    sendAjaxRequest("get", "/api/user/keys?" + url_params, null, displayRows);
}

function displayRows(){
    let response = JSON.parse(this.responseText);
    total_pages = response.last_page;
    let keyList = response.data;
    let keyListElement = document.getElementById('key_list');

    keyListElement.innerHTML = "";

    for (const key of keyList) {
        keyListElement.appendChild(displayRow(key));
    }

    if (!pagination_set){
        $('#list-links').twbsPagination({
            totalPages: response.last_page,
            visiblePages: 7,
            cssStyle: '',
            onInit: null,
            onPageClick: function (event, page) {
                getKeyList(page);
            }
        });
        pagination_set = true;
    }
}

function displayRow(row){

    let template = document.createElement('article');

    let paymethod_image;
    if (row.method == 'PayPal')
        paymethod_image = "/storage/images/others/pp.png";

    let date = row.timestamp.substr(0, row.timestamp.indexOf(' ')); 

    let row_color = "50, 200, 100";

    if (row.status == "Pending")
        row_color = "240, 130, 20";
    else if (row.status == "Aborted")
        row_color = "240, 20, 20";


    template.innerHTML =     
    `<div class="row border border-secondary">
        <div class="col mx-0 px-0 py-4" style="flex: 0 0 3px; background-color:rgba(` + row_color +`);"></div>
        <div class="col-3 my-auto">` + row.game_key.game.title + `</div>
        <div class="col-2 my-auto">` + row.price + `€</div>
        <div class="col-2 my-auto d-none d-md-block">` + date +`</div>
        <div class="col my-auto d-none d-md-block"> <img src="` + paymethod_image + `"
                style="max-width:60%; height:auto;"></div>
        <div class="col-2 my-auto mr-1">` + row.status + `</div>
        <div class="col my-auto" >
            <button class="btn btn-secondary btn-sm w-100 my-auto" type="button">
                key</button>
        </div>

    </div>`;

    return template;
}






