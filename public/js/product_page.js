let open_button = document.getElementById('open_review_form');
let edit_form = document.getElementById('review_edit_form');
if (open_button != null) {
    open_button.addEventListener("click", function () {
        let hidden = edit_form.getAttribute("hidden");
        if (hidden == null) {
            edit_form.setAttribute("hidden", "true");
        }
        else {
            edit_form.removeAttribute("hidden");
        }
    });
}

let editStars = document.querySelectorAll(".fa-star.text-warning");
for (let edit_star of editStars) {
    edit_star.addEventListener("click", function () {
        let score = this.getAttribute("score");
        document.getElementById("form_review_score").value = score;
        for (let other_star of editStars) {
            let other_score = other_star.getAttribute("score");
            if (other_score <= score) {
                other_star.classList.remove("far");
                other_star.classList.add("fas");
            }
            else {
                other_star.classList.remove("fas");
                other_star.classList.add("far");
            }
        }
    })
}