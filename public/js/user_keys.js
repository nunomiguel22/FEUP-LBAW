var pagination_set = false;
var curr_page = 1;

var search_field = document.getElementById("key_search_field");
var key_filter = document.getElementById("key_filter");
var key_data = null;

var timeout = null;
search_field.addEventListener("keyup", function () {
    clearTimeout(timeout);
    let value = this.value;
    timeout = setTimeout(function () {
        getKeyList(curr_page, value, key_filter.value);
    }, 500);
});

key_filter.addEventListener("change", function () {
    getKeyList(curr_page, search_field.value, this.value);
});

getKeyList(1);

function getKeyList(page, key_search, key_filter) {
    document.getElementById("key_list").innerHTML = "";
    let params = { page: page };
    curr_page = page;

    if (key_filter && key_filter != "All") params.key_filter = key_filter;

    if (key_search) params.key_search = key_search;

    let url_params = encodeForAjax(params);
    startLoader(document.getElementById("spinner_loader"));
    sendAjaxRequest("get", "/api/user/keys?" + url_params, null, displayRows);
}

function displayRows() {
    key_data = JSON.parse(this.responseText);
    total_pages = key_data.last_page;
    let keyList = key_data.data;
    let keyListElement = document.getElementById("key_list");

    keyListElement.innerHTML = "";

    for (const key of keyList) {
        keyListElement.appendChild(displayRow(key));
    }

    if (!pagination_set) {
        $("#list-links").twbsPagination({
            totalPages: key_data.last_page,
            visiblePages: 7,
            cssStyle: "",
            onInit: null,
            onPageClick: function (event, page) {
                getKeyList(page);
            },
        });
        pagination_set = true;
    }
    stopLoader();
}

function displayRow(row) {
    let template = document.createElement("article");

    let date = row.timestamp.substr(0, row.timestamp.indexOf(" "));

    let row_color = "50, 200, 100";

    if (row.status == "Pending") row_color = "240, 130, 20";
    else if (row.status == "Aborted") row_color = "240, 20, 20";

    let key_button = "";

    if (row.status == "Completed")
        key_button =
            `<button class="btn btn-success btn-sm w-100 my-auto mx-0 p-1 col" data-toggle="modal" data-target="#gameKeyModal" 
                        type="button" onClick="fillModal(` + row.id + `)"> KEY
            </button>`;
    else key_button = `<div class="w-100 my-auto mx-0 p-1 col"></div>`

    template.innerHTML =
    `<div class="row my-2" style="min-height:30px">
        
        <div class="col-3 col-md-4 my-auto mx-0 p-1">` +
            row.game_key.game.title +
        `</div>
        <div class="col col-md-1 my-auto mx-0 p-1">` +
            row.price + `€
        </div>
        <div class="col my-auto mx-0 p-1">` +
            date +
        `</div>
        <div class="col my-auto mx-0 p-1">` 
            + row.method + ` 
        </div>
        <div class="col my-auto mx-0 p-0"> 
            <i class="fas fa-circle ml-3 ml-md-0" style="color:rgba(` + row_color +`)"></i>
            <span class="ml-1 d-none d-md-inline">` + row.status + `</span>
        </div>
        ` +
            key_button +
        `
        
    </div>`;

    return template;
}

function fillModal(purchase_id) {
    let purchase = null;

    for (const pur of key_data.data) if (pur.id == purchase_id) purchase = pur;

    if (!purchase) return;

    document.getElementById("modal_title").innerHTML =
        purchase.game_key.game.title;
    document.getElementById("modal_price").innerHTML = purchase.price;
    document.getElementById("modal_timestamp").innerHTML = purchase.timestamp;

    document.getElementById("modal_status").innerHTML = purchase.status;
    document.getElementById("modal_pmethod").innerHTML = purchase.method;
    document.getElementById("modal_key").value = purchase.game_key.key;
    document.getElementById("modal_pid").innerHTML = purchase.id;
}
