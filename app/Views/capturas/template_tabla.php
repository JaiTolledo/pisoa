<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <title>Listado</title>
</head>
<style>
    * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', Helvetica, Arial, Lucida, sans-serif !important;
        -webkit-font-smoothing: antialiased;
    }

    h2 {
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: black;
        padding: 30px 0;
    }

    /* Table Styles */

    .table-wrapper {
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }








    /* Responsive */

    @media (max-width: 767px) {}
</style>

<body>
    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', Helvetica, Arial, Lucida, sans-serif !important;
            -webkit-font-smoothing: antialiased;
        }

        h2 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: black;
            padding: 30px 0;
        }

        /* Table Styles */

        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        #fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: black 2px solid;
            border-collapse: collapse;
            width: 100%;

            background-color: white;
        }

        #fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        #fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        #fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }


        #fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        #fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }

            .fl-table thead th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div>
        <h2>Listado de obras</h2>
        <table style="width: 100%;" id="fl-table">
            <thead>
                <tr>
                    <th colspan="6"></th>
                    <th colspan="4">Documentos</th>
                    <th colspan="3">Avances</th>
                </tr>
                <tr>
                    <th style=" width: 10% !important; border: 1px solid black;">Nombre</th>
                    <th style=" border: 1px solid black;">Datos generales</th>
                    <th style=" border: 1px solid black;">Licitación</th>
                    <th style=" border: 1px solid black;">Contrato</th>
                    <th style=" border: 1px solid black;">Partidas</th>
                    <th style=" border: 1px solid black;">Prog pagos</th>

                    <th style=" border: 1px solid black;">Pendiente</th>
                    <th style=" border: 1px solid black;">Enviado</th>
                    <th style=" border: 1px solid black;">Revisado</th>
                    <th style=" border: 1px solid black;">Observado</th>

                    <th style=" border: 1px solid black;">Enviado</th>
                    <th style=" border: 1px solid black;">Revisado</th>
                    <th style=" border: 1px solid black;">Observado</th>


                </tr>

            </thead>
            <tbody>
                <?php foreach ($datas as $key => $p) : ?>
                    <tr>
                        <td style=" border: 1px solid black;"><?= $p->nombre ?></td>
                        <td style=" border: 1px solid black;"><?= $p->datos_generales ?></td>
                        <td style="border: 1px solid black;"><?= $p->licitacion ?></td>
                        <td style=" border: 1px solid black;"><?= $p->contrato ?></td>
                        <td style=" border: 1px solid black;"><?= $p->partidas ?></td>
                        <td style="border: 1px solid black;"><?= $p->prog_pagos ?></td>

                        <td style=" border: 1px solid black;"><?= $p->pendientes_expediente ?></td>



                        <td style=" border: 1px solid black;"><?= $p->enviados_expediente ?></td>



                        <td style="border: 1px solid black;"><?= $p->revisados_expediente ?></td>



                        <td style=" border: 1px solid black;"><?= $p->observados_expediente ?></td>



                        <td style="border: 1px solid black;"><?= $p->enviados_avance ?></td>


                        <td style=" border: 1px solid black;"><?= $p->revisados_avance ?></td>


                        <td style="border: 1px solid black;"><?= $p->observados_avance ?></td>





                    </tr>
                <?php endforeach ?>



            </tbody>
        </table>
    </div>
</body>

</html>