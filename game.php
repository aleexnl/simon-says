<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
    <style>
        body {
            color: #f1f6f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border: 10px solid #A4A4A4;
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

        tbody tr td {
            cursor: pointer;
            height: 100px;
            width: 100px;
            background-color: #464646;
        }

        tbody tr td:hover {
            opacity: 0.8;
        }

        tbody tr td:active {
            opacity: 0.6;
        }

        .container {
            margin: 0% 15%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <header>

    </header>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><button>RESOLDRE</button></td>
                        <td colspan="3"></td>
                        <td><button>INICIA PARTIDA</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>