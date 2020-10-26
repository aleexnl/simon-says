let buttons = document.getElementsByClassName("option"); // Get all buttons
let resolve_button = document.getElementById("btn-resolve");
let start_button = document.getElementById("btn-start");

start_button.onclick = function () {
    let solutions = document.getElementsByClassName("solution");
    for (const solution of solutions) {
        solution.classList.add("selected");
    }
    resolve_button.setAttribute("disabled", true);
    setTimeout(() => {
        for (const solution of solutions) {
            solution.classList.remove("selected");
        }
        resolve_button.removeAttribute("disabled");
    }, 4000);
};

resolve_button.onclick = function () {
    let btnSelected = document.getElementsByClassName("selected solution");
    if (btnSelected.length == 7) {
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

function redirectPage(endgame) {
    window.location.href = "./result.php?result=" + endgame;
}
