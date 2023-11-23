<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        @page {
            size: auto;
            odd-header-name: header;
            odd-footer-name: footer;
        }

        .container {
            font-size: 18px;
            margin: 0px;
            margin-bottom: 0px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .td-title {
            background-color: #e5f7f6;
            color: #000;
            font-weight: bolder;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 5px;
        }

        th,
        td {
            padding: 4px;
            border: 0.5px solid #cecece;
        }

        .table-header th,
        .table-header td {
            padding: 4px;
            border: none;
        }

        .table th {
            background-color: #d4dfea;
            color: #19395c;
        }

        .text-center {
            text-align: center;
        }

        .item-title {
            color: aliceblue;
            padding: 10px;
            text-align: center;

            font-weight: bolder !important;
            font-size: 20px !important;

        }

        .cont-title {
            padding: 20px;
        }
    </style>
</head>


<body>
    <htmlpageheader name="header" style="display:none;" style="text-align:center;">
        <table class="table-header">
            <tr>
                <th width="20%" style="background-color:#2A5F9A">
                    <img style="margin:auto;width:180px" src="<?= base_url("public/img/oaxaca_white.png") ?>">
                </th>
                <th width="60%" style="font-size:20px;text-align:center;background-color:#2A5F9A;color:#fff" class="text-left">
                    <?=$title?>
                    <br>
                    <?=$subtitle?>
                </th>
                <th width="20%" style="background-color:#2A5F9A">
                    <img style="margin:auto;width:80px" src="<?= base_url("public/img/qrcode_ejemplo.png") ?>">
                </th>
            </tr>
        </table>

    </htmlpageheader>
    <htmlpagefooter name="footer" style="display:none">
        <table width="100%">
            <tr>
                <td width="33%">

                </td>
                <td width="33%" align="center" style="font-size:10px;font-style: italic;">
                    {PAGENO}/{nbpg}
                </td>
                <td width="33%" style="text-align: right;">
                </td>
            </tr>
        </table>
    </htmlpagefooter>
    <div class="container">
        <?=$html?>
    </div>
</body>

</html>