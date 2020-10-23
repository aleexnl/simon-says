buttons = document.getElementsByClassName("option"); // Get all buttons

for (const buton of buttons) {
    // For each button ad an onclick() event listener
    buton.onclick = function () {
        buton.setAttribute("disabled", true); // Disable the button
        buton.classList.remove("option"); // Remove the class option
        buton.classList.add("selected"); // Add the option that is selected
        // console.log("Click!");
    };
}

console.log(buttons)

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
        if (allCorrect) window.location.href = "./victory.php"
        else window.location.href = "./gameover.php"
    } else window.location.href = "./gameover.php"

}