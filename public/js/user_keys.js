var pagination_set = false;
var curr_page = 1;

var search_field = document.getElementById("key_search_field");
var key_filter = document.getElementById("key_filter");
var key_data = null;

var timeout = null;
search_field.addEventListener('keyup', function(){
    clearTimeout(timeout);
    let value = this.value;
    timeout = setTimeout(function () {
        getKeyList(curr_page, value, key_filter.value);
    }, 500);
});

key_filter.addEventListener('change', function(){
    getKeyList(curr_page, search_field.value, this.value);
});


getKeyList(1);

function getKeyList(page, key_search, key_filter) {
    document.getElementById('key_list').innerHTML = "";
    let params = { page: page };
    curr_page = page;

    if (key_filter && key_filter != 'All')
        params.key_filter = key_filter;

    if (key_search)
        params.key_search = key_search;

    let url_params = encodeForAjax(params);
    startLoader(document.getElementById("spinner_loader"));
    sendAjaxRequest("get", "/api/user/keys?" + url_params, null, displayRows);
}

function displayRows(){
    key_data = JSON.parse(this.responseText);
    total_pages = key_data.last_page;
    let keyList = key_data.data;
    let keyListElement = document.getElementById('key_list');

    keyListElement.innerHTML = "";

    for (const key of keyList) {
        keyListElement.appendChild(displayRow(key));
    }

    if (!pagination_set){
        $('#list-links').twbsPagination({
            totalPages: key_data.last_page,
            visiblePages: 7,
            cssStyle: '',
            onInit: null,
            onPageClick: function (event, page) {
                getKeyList(page);
            }
        });
        pagination_set = true;
    }
    stopLoader();
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

    let key_button = "";

    if (row.status == "Completed")
        key_button = `<button class="btn btn-success btn-sm w-100 my-auto" data-toggle="modal" data-target="#gameKeyModal" 
                        type="button" onClick="fillModal(`+ row.id +`)">
                        key</button>`;

    template.innerHTML =     
    `<div class="row border border-dark bg-secondary">
        
        <div class="col-3 my-auto">` + row.game_key.game.title + `</div>
        <div class="col-2 my-auto">` + row.price + `€</div>
        <div class="col-2 my-auto d-none d-md-block">` + date +`</div>
        <div class="col my-auto d-none d-md-block"> <img src="` + paymethod_image + `"
                style="max-width:60%; height:auto;"></div>
        <div class="col-2 my-auto mr-1"> 
            <i class="fas fa-circle ml-3 ml-md-0" style="color:rgba(`+ row_color +`)"></i><span class="ml-1 d-none d-md-inline">` + row.status + `</span>
        </div>
        <div class="col my-auto" >` + key_button + `
        </div>
    </div>`;

    return template;
}


function fillModal(purchase_id){
    let purchase = null;

    for (const pur of key_data.data)
        if (pur.id == purchase_id)
            purchase = pur;

    if (!purchase)
        return;
        
    document.getElementById('modal_title').innerHTML = purchase.game_key.game.title;
    document.getElementById('modal_price').innerHTML = purchase.price;
    document.getElementById('modal_timestamp').innerHTML = purchase.timestamp;
    
    document.getElementById('modal_status').innerHTML = purchase.status;
    document.getElementById('modal_pmethod').innerHTML = purchase.method;
    document.getElementById('modal_key').value = purchase.game_key.key;
    document.getElementById('modal_pid').innerHTML = purchase.id;
}



