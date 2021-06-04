var purchases = null;

function startPaginator(pages, page) {
    new Paginator("list-links", pages, page, function (npage) {
        window.location.href = "/admin/sales?page=" + npage;
    });
}

function getPurchases(purchases) {
    console.log(purchases);
}
