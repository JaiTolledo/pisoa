
<style>
    * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    body {
        font-family: Helvetica;

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

    .fl-table thead th {
        color: #ffffff;
        background: #3F0019;
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
        .encabezado{
            margin-bottom: 80px !important;
        }
    /* Responsive */
@page {
        /* ensure you append the header/footer name with 'html_' */
        header: html_MyCustomHeader; /* sets <htmlpageheader name="MyCustomHeader"> as the header */
        margin-header: 1mm;
        margin-bottom: 50mm;

    }
</style>
<div class="encabezado">
<htmlpageheader name="MyCustomHeader">
    <table style="margin-bottom:50px; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;" width="100%">
        <tbody>
            <tr >
            <th style="color:#fff" width="20%">
                    <img style="margin:auto;width:180px" src="<?= base_url("public/img/logo_oaxaca.png") ?>">
                </th>
                <th width="80%" height="20"  style=" color:#235B4E; font-weight:bold; font-size:15px;"  class="text-left">
                <?php foreach ($data as $key => $m) :
    $nombre=$m->nombre_completo;
    ?>
    <?php endforeach ?>   
                REPORTE DE EXPEDIENTES DE LA OBRA <?= $nombre ?>
                </th>
            </tr>
        </tbody>
        <br>
    </table>
</htmlpageheader>

</div>
<br>

<div class="tabla"> 
<table class="fl-table" id="tablita">
    <thead>
        <tr>
        <th style="text-align: center;">Número</th>
        <th style="text-align: center;">Descripción</th>
      
        </tr>
    </thead>
    <?php foreach ($data as $key => $m) :
    ?>

      <tr>
      <td style="text-align: center;"> <?= $m->num_expediente ?>
         </td>
      <td
    <?php
		if($m->existencia == "SI") {
  		    echo ' style="color: #389415; font-weight: bold;"';
		} 
	?>
><?= $m->descripcion ?></td>
        

      </tr>
    <?php endforeach ?>
</table>
</div>