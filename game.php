<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            color: #f1f6f9;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            margin: 0;
            background-color: #1b1b1b;
        }

        .game {
            border: 6px solid #000;
        }

        table {
            border: 65px solid #A4A4A4;
            border-collapse: collapse;
        }

        thead tr td {
            text-align: center;
        }


        td {
            border: 5px solid #A4A4A4;
            border-spacing: 0px;
        }

        thead tr td {
            background-color: #000000 !important;
        }

        tbody tr td button {
            cursor: pointer;
            height: 100px;
            width: 100px;
            background-color: #464646;
        }

        tbody tr td button:hover {
            opacity: 0.8;
        }

        tbody tr td:active {
            opacity: 0.6;
        }

        .container {
            margin: auto;
            display: flex;
            justify-content: center;
        }

        button#btn-start {
            width: 100px;
        }

        td.box-btn button {
            width: -webkit-fill-available;
            height: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="game">

            <table>
                <thead>
                    <tr>
                        <td colspan="5">
                            <h1>Level1</h1>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                        <td><button type="submit"></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="box-btn"><button id="btn-resolv" type="submit">RESOLDRE</button></td>
                        <td colspan="3"></td>
                        <td class="box-btn"><button id="btn-start" type="submit">INICIA PARTIDA</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>