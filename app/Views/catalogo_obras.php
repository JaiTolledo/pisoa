<?= view('template_header'); ?>
<style>
  th {
    color: #fff;
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
</style>

<div class="container">
<?php foreach ($data as $key => $m) :
    $id=$m->obra;
    ?>
    <?php endforeach ?>
    <a class="btn btn-app" href="<?= base_url("catalogopdf/$id") ?>">
<i class="fas fa-file-pdf"></i>
</a>


  <table class="table">
    
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

<?= view('template_footer'); ?>