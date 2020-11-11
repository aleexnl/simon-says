let switchHeader = document.getElementById("chBoxHeader");
let switchAside = document.getElementById("chBoxAside");

if (JSON.parse(window.sessionStorage.getItem("blindness"))) {
    getUrlSvgFile();
    switchHeader.checked = true;
    switchAside.checked = true;
} else
    document.body.style.filter = "none";

function headerBlindness() {
    if (!switchHeader.checked)
        activateColorBlindness();
    else
        disableColorBlindness();
}

function asideBlindness() {
    if (!switchAside.checked)
        activateColorBlindness();
    else
        disableColorBlindness();
}

function activateColorBlindness() {
    getUrlSvgFile();
    window.sessionStorage.setItem("blindness", JSON.stringify(true));
    switchHeader.checked = true;
    switchAside.checked = true;
}

function disableColorBlindness() {
    document.body.style.filter = "none";
    window.sessionStorage.setItem("blindness", JSON.stringify(false));
    switchHeader.checked = false;
    switchAside.checked = false;
}

// FUNCTION TO SHOW SIDE MENU
let navbarPage = document.getElementsByClassName("navbar-page")[0];
let circleSvg = document.getElementsByClassName("circle")[0];
let lineOneSvg = document.getElementsByClassName("line-1")[0];
let lineTwoSvg = document.getElementsByClassName("line-2")[0];

function asideMenu() {
    if (navbarPage.className == "navbar-page open-page-navbar") {
        navbarPage.className = "navbar-page";
        document.body.style.overflowY = "hidden";
        circleSvg.classList.add("circle-in");
        lineOneSvg.classList.add("line1-in");
        lineTwoSvg.classList.add("line2-in");
    } else {
        navbarPage.className = "navbar-page open-page-navbar";
        document.body.style.overflowY = "auto";
        circleSvg.classList.remove("circle-in");
        lineOneSvg.classList.remove("line1-in");
        lineTwoSvg.classList.remove("line2-in");
    }
}

function getUrlSvgFile() {
    if (window.location.href.split("/").indexOf("pages") != -1)
        document.body.style.filter = "url('../img/filters.svg#deuteranopia')";
    else
        document.body.style.filter = "url('img/filters.svg#deuteranopia')";
}