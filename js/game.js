let buttons = document.getElementsByClassName("option"); // Get all buttons.
let uiButtons = document.getElementsByTagName("button");
let resolve_button = document.getElementById("btn-resolve"); // get resolve button.
let start_button = document.getElementById("btn-start");
let correctButtons = document.getElementById("correct-squares"); // get the number of correct squares.
let showTime = document.getElementById("show-time");
let time = 0; // Time variable
let intervalTimer = "";
let hoverAudio = document.getElementById("hoverAudio");
let selectAudio = document.getElementById("selectAudio");

function redirectPage(endgame, time) {
    // Redirect to the corresponding result page.
    window.location.href = `./result.php?result=${endgame}&time=${time}`;
}

function timer(miliseconds) {
    // Timer for every milisecond passed as arg
    setInterval(() => {
        time++;
    }, miliseconds);
}

function enableElements(elements) {
    // Enable all buttons from the game board.
    for (const element of elements) {
        element.removeAttribute("disabled");
    }
}

function showSolutions(buttons) {
    // Show all the solutions.
    for (const button of buttons) {
        button.classList.add("selected");
    }
}

function hideSolutions(buttons) {
    // Hide all solutions.
    for (const button of buttons) {
        button.classList.remove("selected");
    }
}

function showImpostor(buttons) {
    // Show all the solutions.
    for (const button of buttons) {
        button.classList.add("wrong");
    }
}

function hideImpostor(buttons) {
    // Hide all solutions.
    for (const button of buttons) {
        button.classList.remove("wrong");
    }
}

function normalGame() {
    let solutions = document.getElementsByClassName("solution"); // Get all solutions
    showSolutions(solutions); // Show solutions
    resolve_button.setAttribute("disabled", true); // Disable resolve button
    setTimeout(() => {
        // After 4 seconds
        timer(1000); // enable timer
        enableElements(buttons); // enable buttons
        hideSolutions(solutions); // hide solutions
        resolve_button.removeAttribute("disabled"); // Enable resolve button
        start_button.setAttribute("disabled", true); // Disable start button
    }, showTime.innerText * 1000);
}

function impostorGame() {
    let solutions = document.getElementsByClassName("solution"); // Get all solutions
    let impostor = document.getElementsByClassName("impostor"); // Get all solutions
    showSolutions(solutions); // Show solutions
    showImpostor(impostor);
    resolve_button.setAttribute("disabled", true); // Disable resolve button
    setTimeout(() => {
        // After 4 seconds
        timer(1000); // enable timer
        enableElements(buttons); // enable buttons
        hideSolutions(solutions); // hide solutions
        hideImpostor(impostor);
        resolve_button.removeAttribute("disabled"); // Enable resolve button
        start_button.setAttribute("disabled", true); // Disable start button
    }, showTime.innerText * 1000);
}

start_button.onclick = function () {
    if (!document.getElementById("impostor-squares")) {
        normalGame();
    } else {
        impostorGame();
    }
};

resolve_button.onclick = function () {
    let solution = document.getElementsByClassName("selected solution");
    let selectedButtons = document.getElementsByClassName("selected");
    clearInterval(intervalTimer);
    if (
        solution.length == correctButtons.innerText &&
        selectedButtons.length == correctButtons.innerText
    ) {
        redirectPage("win", time);
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

for (const button of uiButtons) {
    button.addEventListener("mouseover", function (event) {
        hoverAudio.play();
    });
    button.addEventListener("click", function (event) {
        selectAudio.play();
    });
}
