buttons = document.getElementsByClassName("option"); // Get all buttons
random_squares = document.getElementsByClassName("random"); // Get all random buttonns;
// console.log(random_squares); // Debug log

for (const button of random_squares) {
    button.classList.remove("random");
}

for (const button of buttons) {
    // For each button ad an onclick() event listener
    button.onclick = function () {
        button.setAttribute("disabled", true); // Disable the button
        button.classList.remove("option"); // Remove the class option
        button.classList.add("selected"); // Add the option that is selected
    };
}

function checkBtn(strRightPosition) {
    let btnSelected = document.getElementsByName("btn-option");
    let positions = strRightPosition.split(",");
    if (document.getElementsByClassName("selected").length == 7) {
        let allCorrect = true;
        for (let i = 0; i < positions.length; i++) {
            if (btnSelected[positions[i] - 1].className == "option") {
                allCorrect = false;
                break;
            }
        }
        if (allCorrect) redirectPage("win");
        else redirectPage("lose");
    } else redirectPage("lose");
}

function redirectPage(endgame) {
    window.location.href = "./result.php?result=" + endgame;
}
