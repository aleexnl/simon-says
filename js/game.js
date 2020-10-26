let squares = document.getElementsByClassName("square");
let buttons = document.getElementsByClassName("option"); // Get all buttons
let solutions = document.getElementsByClassName("solution");
let resolve_button = document.getElementById("btn-resolve");

// console.log(solutions);

resolve_button.onclick = function (solutions) {
    let btnSelected = document.getElementsByClassName("selected");
    if (btnSelected.length == 7) {
        for (const button of btnSelected) {
            console.log(solutions.indexOf(button));
            /*if (solutions.indexOf(button) == -1) {
                redirectPage("lose");
            }*/
        }
        //redirectPage("win");
    } else redirectPage("lose");
};

for (const button of buttons) {
    // For each button ad an onclick() event listener
    button.onclick = function () {
        button.setAttribute("disabled", true); // Disable the button
        button.classList.remove("option"); // Remove the class option
        button.classList.add("selected"); // Add the option that is selected
        console.log(squares);
    };
}

function redirectPage(endgame) {
    window.location.href = "./result.php?result=" + endgame;
}
