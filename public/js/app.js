function addEventListeners() {
    let submitButtons = document.querySelectorAll('[type="submit"]');
    for (let submitButton of submitButtons) {
        submitButton.form.addEventListener("submit", function () {
            startLoader(submitButton);
        });
    }
}

function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data)
        .map(function (k) {
            return encodeURIComponent(k) + "=" + encodeURIComponent(data[k]);
        })
        .join("&");
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();
    request.open(method, url, true);
    request.setRequestHeader(
        "X-CSRF-TOKEN",
        document.querySelector('meta[name="csrf-token"]').content
    );
    request.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded",
        "X-Header-Name: XMLHttpRequest"
    );
    request.addEventListener("load", handler);
    request.send(encodeForAjax(data));
}

function startLoader(element) {
    let loader = document.createElement("div");
    loader.classList.add("loader");
    loader.id = "dynamic-loader";
    element.innerHTML = "";
    element.appendChild(loader);
}

function stopLoader() {
    let loader = document.getElementById("dynamic-loader");
    if (loader != null) loader.parentNode.removeChild(loader);
}

addEventListeners();
