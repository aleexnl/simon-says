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
