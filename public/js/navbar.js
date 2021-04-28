$(document).ready(function () {
    if (window.location.href.indexOf("#LoginModal") != -1) {
        $("#LoginModal").modal("show");
    }
});

$(document).ready(function () {
    if (window.location.href.indexOf("#SignupModal") != -1) {
        $("#SignupModal").modal("show");
    }
});

let loginButton = document.getElementById("loginButton");
let registerButton = document.getElementById("registerButton");

if (loginButton !== null) {
    loginButton.parentNode.parentNode.addEventListener("submit", function () {
        startLoader("loginButton");
    });
}

if (registerButton !== null) {
    registerButton.parentNode.parentNode.addEventListener(
        "submit",
        function () {
            startLoader("registerButton");
        }
    );
}
