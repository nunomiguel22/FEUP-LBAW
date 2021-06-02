let indicators = document.querySelectorAll(".wishlist-indicator");

for (let indicator of indicators)
    indicator.addEventListener("click", toggleWishlist);

function toggleWishlist() {
    let status = this.getAttribute("in_wishlist");
    let url = "/products/" + this.getAttribute("game_id") + "/wishlist";

    if (status == "false") {
        sendAjaxRequest("POST", url, null, toggleIndicator(this, status));
    } else {
        console.log("asd");

        sendAjaxRequest("POST", url, { _method: "DELETE" }, toggleIndicator(this, status));
    }
}

function toggleIndicator(indicator, status) {
    if (status == "false") {
        indicator.innerHTML = `<i class="fas fa-check-circle"></i>`;
        status = "true";
    } else {
        indicator.innerHTML = `<i class="fas fa-plus-circle"></i>`;
        status = "false";
    }

    indicator.setAttribute("in_wishlist", status);
}
