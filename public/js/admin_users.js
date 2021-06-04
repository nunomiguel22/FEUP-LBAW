function startPaginator(pages, page) {
    new Paginator("list-links", pages, page, function (npage) {
        window.location.href = "/admin/users?page=" + npage;
    });
}

document.getElementById("search_btn").addEventListener("click", function () {
    let user_id = document.getElementById("search_input").value;
    if (user_id && user_id > 1)
        window.location.href = "/admin/users?user_id=" + user_id;
});
