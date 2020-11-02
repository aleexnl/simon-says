let buttons = document.getElementsByClassName("option"); // Get all buttons
let resolve_button = document.getElementById("btn-resolve");
let start_button = document.getElementById("btn-start");
let time = 0;
let intervalTimer = "";

start_button.onclick = function () {
    let solutions = document.getElementsByClassName("solution");
    for (const solution of solutions) {
        solution.classList.add("selected");
    }
    resolve_button.setAttribute("disabled", true);
    setTimeout(() => {
        timer();
        enableButtons(buttons);
        for (const solution of solutions) {
            solution.classList.remove("selected");
        }
        resolve_button.removeAttribute("disabled");
        start_button.setAttribute("disabled", true);
    }, 4000);
};

resolve_button.onclick = function () {
    let solution = document.getElementsByClassName("selected solution");
    let selectedButtons = document.getElementsByClassName("selected");
    clearInterval(intervalTimer)

    if (solution.length == 7 && selectedButtons.length == 7) {
        redirectPage("win",time);
    } else {
        redirectPage("lose", time);
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

function redirectPage(endgame, time) {
    window.location.href = "./result.php?result=" + endgame + "&userTime=" + time;
}
function timer() {
    intervalTimer = setInterval(() => {
        time++;
        console.log(time);
    }, 1000);
}

function enableButtons(buttons) {
    for (const button of buttons) {
        button.removeAttribute("disabled");
    }
}