<?= view('template_header'); ?>
<style>
  th {
    color: #FFF;
    font-weight: 700px;
    font-size: 14px;
    text-align: center;
    background-color: #E3EAEE;
  }

  table tbody tr:nth-child(odd) {
    background: #f1F1F1;
  }

  table tbody tr:nth-child(even) {
    background: #FFF;
  }
  table thead th:nth-child(odd) {
    background: #00796B;
  }

  table thead th:nth-child(even) {
    background: #0D584B;
  }
  a{
    color: #2559FF;
    font-size: 16px;
    
  }
  

  .titulo-tabla {
    background-color: #141b41;
    text-align: center;
    margin-left: auto;
  }
  .tituloE{
    color: #780116;
    font-size: 24;
    font-weight: bold;
    text-align: left;
  }
</style>
<nav class="navbar navbar-expand navbar-light">

<ul class="navbar-nav">

<li class="nav-item d-none d-sm-inline-block">
<a href="<?= base_url("expedientes/") ?>" class="nav-link">Expedientes por obras</a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="<?= base_url("ejecutoras/") ?>" class="nav-link">Expedientes por ejecutoras</a>
</li>
</ul>
</nav>

<div class="container">

<H3 class="tituloE">REPORTE DE OBRAS</H3>
<?php foreach ($data as $key => $m) :
    $id=$m->unidad_ejecutora;
    ?>
    <?php endforeach ?>
  <a class="btn btn-app" style="background-color: transparent; border-color: transparent"  href="<?= base_url("obrasXejecutorapdf/$id") ?>">
  <i class="fa fa-print" style="color:#000;"  aria-hidden="true"></i>
  </a>


  <table class="table">
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
      if($id==null){
        print_r("1");
      }
    ?>

      <tr>
        <td style="text-align: center;"> <?= $m->universo_id ?> </td>
        <td style="text-align: center;"><a id="nom-archivo" href="<?= base_url("catalogopdf/$id") ?>" target="_blank"> <?= $m->nombre_completo ?> </a></td>
        <td style="text-align: center;"> <?= $m->total_documentos ?> </td>
        <td style="text-align: center;"> <?= $m->total_enviados ?> </td>
        <td style="text-align: center;"> <?= $m->total_pendientes ?> </td>
        <td style="text-align: center;"> <?= $m->diferencia ?> </td>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<?= view('template_footer'); ?>