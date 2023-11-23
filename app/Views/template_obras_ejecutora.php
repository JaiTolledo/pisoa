
<htmlpageheader name="MyCustomHeader">
    <table style="margin-bottom:50px; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;" width="100%">
        <tbody>
            <tr>
            <th style="color:#fff" width="20%">
                    <img style="margin:auto;width:180px" src="<?= base_url("public/img/logo_oaxaca.png") ?>">
                </th>
                <th width="80%" style=" color:#235B4E; font-weight:bold; font-size:15px;"  class="text-left">
                <?php foreach ($data as $key => $m) :
    ?>    
       <?php endforeach ?>
                REPORTE DE EXPEDIENTES DE LAS OBRAS DE LA EJECUTORA <?= $m->ejecutora_nombre ?>                </th>
            </tr>
        </tbody>
    </table>
</htmlpageheader>
<style>
    * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    body {
        font-family: Helvetica;

    }
    @page {
        /* ensure you append the header/footer name with 'html_' */
        header: html_MyCustomHeader; /* sets <htmlpageheader name="MyCustomHeader"> as the header */
        margin-header: 1mm;

    }

    h2 {
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #3F0019;
        padding: 30px 0;
    }

    /* Table Styles */

    .table-wrapper {
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    table thead th:nth-child(odd) {
    background: #00796B !important;
    color: #FFF !important;
  }

  table thead th:nth-child(even) {
    background: #0D584B !important;
    color: #FFF !important;

  }

    .fl-table tr:nth-child(even) {
        background: #f1F1F1;
    }
    #tablita{
        margin-top: 20px !important;
    }
    .separador{
        color:   transparent !important;  }

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

<div class="tabla">    
<table class="fl-table" id="tablita">
<thead>
      <tr>
        <th style="text-align: center;">Id Obra</th>
        <th style="text-align: center;"> Nombre de la obra</th>
        <th style="text-align: center;">Total de documentos por obra </th>
        <th style="text-align: center;">Total de documentos que lleva hasta la fecha</th>
        <th style="text-align: center;">Total de documentos que deberia llevar hasta la fecha</th>
        <th style="text-align: center;">Total de documentos restantes hasta la fecha</th>
      </tr>
    </thead>
    <?php foreach ($data as $key => $m) :
      $id = $m->universo_id;
    ?>

      <tr>
        <td style="text-align: center;"> <?= $m->universo_id ?> </td>
        <td style="text-align: center;"> <?= $m->nombre_completo ?> </td>
        <td style="text-align: center;"> <?= $m->total_documentos ?> </td>
        <td style="text-align: center;"> <?= $m->total_enviados ?> </td>
        <td style="text-align: center;"> <?= $m->total_pendientes ?> </td>
        <td style="text-align: center;"> <?= $m->diferencia ?> </td>
      </tr>
    <?php endforeach ?>
</table>
</div>