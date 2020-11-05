let buttons = document.getElementsByClassName("option"); // Get all buttons.
let resolve_button = document.getElementById("btn-resolve"); // get resolve button.
let start_button = document.getElementById("btn-start");
let correctButtons = document.getElementById("correct-squares"); // get the number of correct squares.
let showTime = document.getElementById("show-time");
let time = 0; // Time variable
let intervalTimer = "";
let progressCounter = 0;

function redirectPage(endgame, time) {
    // Redirect to the corresponding result page.
    window.location.href = `./result.php?result=${endgame}&time=${time}`;
}

function timer() {
    // Timer for every second.
    setInterval(() => {
        time++;
    }, 1000);
}

function enableButtons(buttons) {
    // Enable all buttons from the game board.
    for (const button of buttons) {
        button.removeAttribute("disabled");
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

start_button.onclick = function () {
    let solutions = document.getElementsByClassName("solution"); // Get all solutions
    showSolutions(solutions); // Show solutions
    resolve_button.setAttribute("disabled", true); // Disable resolve button
    progressBar(showTime.innerText);
    setTimeout(() => {
        // After 4 seconds
        timer(); // enable timer
        enableButtons(buttons); // enable buttons
        hideSolutions(solutions); // hide solutions
        resolve_button.removeAttribute("disabled"); // Enable resolve button
        start_button.setAttribute("disabled", true); // Disable start button
    }, showTime.innerText * 1000);
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

function progressBar(time){
    let RemainingTime = time;
    let progress = 0; // Initial width of the progress bar.
    var intervalProgress = setInterval(() => { // The width increases in 1% every 10ms*time.
        const progressBar = document.getElementById("Progress");
        progress++;
        progressCounter++
        if (progressCounter >= (100/time)) { // For each 1 second, a second is subtracted from remaining time.
            progressCounter = 0; 
            RemainingTime--; 
        }
        document.getElementById("timer").innerHTML = RemainingTime;
        progressBar.style.width = `${(progress)}%`;
        if (progress >= 100){
            clearInterval(intervalProgress);
        }
    }, time*10);
}

function getColor(title) { //DOES NOT WORK
    return title.split(" ")[0];
}