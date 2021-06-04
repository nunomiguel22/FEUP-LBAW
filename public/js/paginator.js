class Paginator {
    constructor(element, total_pages, current_page, handler) {
        this.element = element;
        this.total_pages = total_pages;
        this.current_page = current_page;
        this.handler = handler;
        this.paginate(this.current_page);
    }

    paginate() {
        let start_index = this.current_page - 2 > 1 ? this.current_page - 2 : 1;
        let end_index =
            this.total_pages - start_index < 5
                ? this.total_pages
                : start_index + 4;

        while (
            this.total_pages - this.current_page < 2 &&
            start_index != 1 &&
            end_index - start_index < 4
        ) {
            --start_index;
        }

        let p_element = document.getElementById(this.element);
        p_element.innerHTML = "";
        let ul_element = document.createElement("ul");
        ul_element.classList.add("pagination");

        p_element.appendChild(ul_element);

        if (this.current_page > 1) {
            this.createPageElement(ul_element, "text-danger", "<", this.current_page - 1);
        }

        for (let i = start_index; i <= end_index; i++) {
            this.createPageElement(ul_element, null, i, i);
        }

        if (this.current_page < this.total_pages) {
            this.createPageElement(ul_element, "text-danger", ">", this.current_page + 1);
        }
    }

    createPageElement(ul_element, cls, symbol, page_link) {
        let li_element = document.createElement("li");
        li_element.classList.add("page-item");
        li_element.classList.add("font-weight-bold");
        
        if (page_link == this.current_page) li_element.classList.add("active");

        let a_element = document.createElement("a");
        a_element.classList.add("page-link");
        a_element.setAttribute("href", "#");
        a_element.innerHTML = symbol;
        a_element.classList.add(cls);

        li_element.appendChild(a_element);
        ul_element.appendChild(li_element);

        let pag = this;

        li_element.addEventListener("click", function () {
            pag.current_page = page_link;
            pag.paginate();
            pag.handler(pag.current_page);
        });
    }
}
