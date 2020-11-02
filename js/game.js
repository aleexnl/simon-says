let buttons = document.getElementsByClassName("option"); // Get all buttons
let resolve_button = document.getElementById("btn-resolve");
let start_button = document.getElementById("btn-start");
let tiempo = 0;

function redirectPage(endgame) {
    window.location.href = "./result.php?result=" + endgame;
}

function temporizador() {
    setInterval(() => {
        tiempo++;
        console.log(tiempo);
    }, 1000);
}

function enableButtons(buttons) {
    for (const button of buttons) {
        button.removeAttribute("disabled");
    }
}

function showSolutions(buttons) {
    for (const button of buttons) {
        button.classList.add("selected");
    }
}

function hideSolutions(buttons) {
    for (const button of buttons) {
        button.classList.remove("selected");
    }
}

start_button.onclick = async function () {
    let solutions = document.getElementsByClassName("solution");
    showSolutions(solutions);
    resolve_button.setAttribute("disabled", true);
    setTimeout(() => {
        temporizador();
        enableButtons(buttons);
        hideSolutions(solutions);
        resolve_button.removeAttribute("disabled");
        start_button.setAttribute("disabled", true);
    }, 4000);
};

resolve_button.onclick = function () {
    let solution = document.getElementsByClassName("selected solution");
    let selectedButtons = document.getElementsByClassName("selected");
    if (solution.length == 7 && selectedButtons.length == 7) {
        redirectPage("win");
    } else {
        redirectPage("lose");
    }
};

for (const button of buttons) {
    // For each button ad an onclick() event listener
    button.onclick = function () {
        if (button.classList.contains("selected")) {
            button.classList.remove("selected");
        } else {
            button.classList.add("selected"); // Add the option that is selected
        }
    };
}
