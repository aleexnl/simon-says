<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Win</title>
    <style>
        @font-face {
            font-family: AmongUsFont;
            src: url("./VCR_OSD_MONO.ttf");
        }

        * {
            color: white;
            font-family: AmongUsFont;
        }

        body#victory {
            background-color: black;
            display: flex;
            flex-flow: row wrap;
        }

        p#title {
            font-size: 120px;
            font-weight: bold;
            color: #e44024;
            text-align: center;
            width: 100%
        }

        div.box {
            width: 75%;
            background-color: #821f0b;
            box-shadow: 0 0 65px 75px #821f0b;
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

        input[type="submit"] {
            width: 120px;
            height: 33px;
            color: #000;
            font-size: larger;
        }

        form#form-home {
            margin: 25px 25px auto auto;
        }

        form#form-retry {
            margin: 25px auto auto 25px;
        }
    </style>
</head>

<body id="victory">
    <header>
        <h2>Simon says</h2>
        <a href="../index.html">Home</a>
        <h3 id="uname"></h3>
    </header>
    <p id="title">Derrota</p>
    <div class="box">
        <p id="text">No has completado el nivel X</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" />
        </form>
        <form action="../" method="post" id="form-retry">
            <input type="submit" value="Reintentar" />
        </form>
    </div>
</body>

</html>