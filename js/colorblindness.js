let win = "/simon-says/pages/victory.php";
let lose = "/simon-says/pages/gameover.php";
let game = "/simon-says/pages/game.php";

function colorControl() {
    let page = window.location.pathname;
    console.log(page);
    console.log(win);
    console.log(lose);
    if (page == win) {
        let colorSwitch = document.getElementById("chBox");
        if (colorSwitch.checked == true){
            document.getElementById("title").style.color = "#3672ff";
            document.getElementsByClassName("box")[0].style.backgroundColor = "#a7a5ff";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #a7a5ff";
        } else {
            document.getElementById("title").style.color = "#0887fa";
            document.getElementsByClassName("box")[0].style.backgroundColor = "#0ff";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #0ff";
        }
    } else if (page == lose) {
        let colorSwitch = document.getElementById("chBox");
        if (colorSwitch.checked == true) {
            document.getElementById("title").style.color = "#a48100";
            document.getElementsByClassName("box")[0].style.backgroundColor = "#a88500";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #a88500";
        } else {
            document.getElementById("title").style.color = "#e44024";
            document.getElementsByClassName("box")[0].style.backgroundColor = "#821f0b";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #821f0b";
        }
    } else if (page == game) {
        let colorSwitch = document.getElementById("chBox");
        if (colorSwitch.checked == true) {
            let selectedSquares = document.getElementsByClassName("selected");
            for (selectedSquares; ;chosen){
                document.getElementsByClassName("selected")[chosen] = "#3672ff";
            }
            document.getElementsByClassName("box")[0].style.backgroundColor = "#a88500";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #a88500";
        } else {
            document.getElementById("title").style.color = "#e44024";
            document.getElementsByClassName("box")[0].style.backgroundColor = "#821f0b";
            document.getElementsByClassName("box")[0].style.boxShadow = "0 0 65px 75px #821f0b";
        }
    }
}