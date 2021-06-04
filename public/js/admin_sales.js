function startPaginator(pages, page) {
    new Paginator("list-links", pages, page, function (npage) {
        window.location.href = "/admin/sales?page=" + npage;
    });
}
