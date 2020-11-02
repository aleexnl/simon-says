let buttons = document.getElementsByClassName("option"); // Get all buttons
let resolve_button = document.getElementById("btn-resolve");
let start_button = document.getElementById("btn-start");
let tiempo = 0;

start_button.onclick = async function () {
    let solutions = document.getElementsByClassName("solution");
    for await (const solution of solutions) {
        solution.classList.add("selected");
        console.log(1);
    }
    console.log(2);
    resolve_button.setAttribute("disabled", true);
    setTimeout(() => {
        temporizador();
        enableButtons(buttons);
        for (const solution of solutions) {
            solution.classList.remove("selected");
        }
        resolve_button.removeAttribute("disabled");
        start_button.setAttribute("disabled", true);
    }, 4000);
    console.log(3);
    UserTimer();
}; 

let timer = 0;
async function UserTimer() {
    let timerCounter = true;
    while (timerCounter == true) {
        setInterval(async () => timer++, 1000);
        console.log(timer);
        if (timer == 5) {
            timerCounter = false;
        }
    }
}


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
