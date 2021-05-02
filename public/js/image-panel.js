let selectImages = document.querySelectorAll(".selectable-image");
for (let selectImage of selectImages) {
    let sel = document.getElementById("rem-image-sel");

    selectImage.addEventListener("click", function () {
        if (selectImage.classList.contains("selected-image")) {
            selectImage.classList.remove("selected-image");
            let option = document.getElementById(
                "img-option-" + selectImage.getAttribute("value")
            );
            option.remove();
        } else {
            selectImage.classList.add("selected-image");
            let option = document.createElement("option");
            let image_id = selectImage.getAttribute("value");

            option.setAttribute("value", image_id);
            option.setAttribute("selected", true);
            option.id = "img-option-" + image_id;
            sel.appendChild(option);
        }
    });
}
