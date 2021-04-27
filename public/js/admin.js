function activateTab(id) {
    document.getElementById("v-pills-" + id + "-tab").classList.add("nav-item");
    document.getElementById("v-pills-" + id + "-tab").classList.add("active");

    document
        .getElementById("v-pills-" + id + "-tab-2")
        .classList.add("nav-item");
    document.getElementById("v-pills-" + id + "-tab-2").classList.add("active");

    document.getElementById("v-pills-" + id).classList.add("show");
    document.getElementById("v-pills-" + id).classList.add("active");
}
