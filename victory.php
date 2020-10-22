<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Win</title>
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url("./VCR_OSD_MONO.ttf");
        }

        * {
            color: white;
            font-family: myFirstFont;
        }

        body#victory {
            background-color: black;
            display: flex;
            flex-flow: row wrap;
        }

        p#title {
            font-size: 120px;
            font-weight: bold;
            color: #0887fa;
            text-align: center;
            width: 100%
        }

        div.box {
            width: 75%;
            background-color: #0ff;
            box-shadow: 0 0 65px 75px #0ff;
            margin: auto;
            border: 0px #0000;
            margin-top: 35px;
            border-radius: 29px;
            display: flex;
            flex-flow: row wrap;
        }

        p#text {
            font-size: 33px;
            color: #000;
            text-align: center;
            width: 100%;
            margin: 5px 0;
            font-weight: bold;
        }

        button[type="submit"] {
            width: 120px;
            height: 33px;
            color: #000;
            font-size: larger;
        }

        button#btn-home {
            margin: 25px 25px auto auto;
        }

        button#btn-next {
            margin: 25px auto auto 25px;
        }
    </style>
</head>

<body id="victory">
    <p id="title">Victoria</p>
    <div class="box">
        <p id="text">Completaste el nivel X</p>
        <button type="submit" id="btn-home">Home</button>
        <button type="submit" id="btn-next">Siguiente</button>
    </div>
</body>

</html>