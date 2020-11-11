let colorSwitch = document.getElementById("chBox");

if (JSON.parse(window.sessionStorage.getItem("blindness"))) {
    document.body.style.filter = "url('../img/filters.svg#deuteranopia')";
    colorSwitch.checked = true;
} else
    document.body.style.filter = "none";

function deuteranopia() {
    if (colorSwitch.checked) {
        document.body.style.filter = "url('../img/filters.svg#deuteranopia')";
        window.sessionStorage.setItem("blindness", JSON.stringify(true));
    } else {
        document.body.style.filter = "none";
        window.sessionStorage.setItem("blindness", JSON.stringify(false));
    }
}