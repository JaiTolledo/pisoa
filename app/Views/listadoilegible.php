<!doctype html>
<html lang="en">
<?= view('template_header'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Documentos IMSS SAT</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <style>
    .container {
      max-width: 500px;
    }
    body {
            font-family: 'Montserrat';
        }


    .botoncito{
      background-color: #2386a8;
      width: 120px;
      height:32px;/* Green */
    border: none;
    color: white;
    padding:5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    border-radius:10px;
    }
    .botoncito:hover, .botoncito:focus {
      background-color: #27ae60;
    }
    h5{
      font-weight: 700px;
      font-size:18px;
      color: #fff;
      padding: 16px
    }
    .titulo-tabla{
      background-color: #141b41;
      text-align: center;
    }
    th{
      color:#2386ab;
      font-weight: 700px;
      font-size:14px;
      text-align: center;
      background-color: #E3EAEE;
    }
    #enlace{
      color:#000;
      font-weight: 600px;
      font-size: 14px;
    }
    #motivo{
      color:#000;
      font-weight: 400px;
      font-size: 14px;
    }

    table tbody tr:nth-child(odd) {
  background: #f1F1F1;
}
table tbody tr:nth-child(even) {
  background: #FFF;
}
#custom-tabs-three-home-tab{
  color:#141b41;
  font-size: 16px;
  font-weight: 700px;
}
#tabs{
  background-color: #E3EAEE;
}
#tabs::after{
  background-color: #141b41;
  color: #fff;
}
#custom-tabs-one-tab .active, #custom-tabs-one-tab a:hover {
    font-weight: 600;
    font-size: 16px;
    outline: none;
    color: white;
    background-color: #2386a8;
    border-radius: 12px, 12px, 0px, 0px;
}
#custom-tabs-one-tab, #custom-tabs-one-tab a {
    font-weight: 600;
    font-size: 16px;
    outline: none;
    color:  #2386a8;
    background-color: #E3EAEE;
    border-radius: 12px, 12px, 0px, 0px;
}
  </style>

</head>
<body>
  <div class="col-12">
  <div>
  <div class="col-sm-6">
  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
  <li class="nav-item">
  <a class="nav-link"  href="<?=base_url("inicio")?>" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Inicio</a>  </li>
  <li class="nav-item">
  <a class="nav-link"  href="<?=base_url("documentos")?>" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Documentos</a>
  </li>
  <li class="nav-item">

    <a id="menu" class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="<?=base_url("ejecutora")?>" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Ejecutora</a>
  </li>
  <li class="nav-item">
  <a class="nav-link"  href="<?=base_url("secretaria")?>" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Secretaria</a>
  </li>

  </ul>
  </div>



  <div id="columna">
      <div class="titulo-tabla">
    <h5> Listados de documentos entregados </h5>
  </div>

    <table class="table">
      <thead>
        <tr>
        <th>Id obra</th>
          <th>Nombre del archivo</th>
          <th>Motivo</th>
          <th >Opciones</th>
        </tr>
        </thead>
            <?php foreach ($data as $key => $m):
    $id = $m->id_documento;
    ?>

			          <tr>

			          <td><a id="enlace"> <?=$m->id_obra?>  </a></td>

			                                        <td><a id="enlace" href="<?=base_url("descarga/$id")?>" target="_blank"><?=$m->name?> </a></td>
			                                        <td id= "motivo" >  <?=$m->descripcion?> </td>
			                                        <td>
			                                        <a href="<?=base_url("inicio/")?>"  class="botoncito" id="boton">Volver a enviar</a>
			                                        </td>


			                                      </tr>
			                                      <?php endforeach?>
                                </table>

        </div>


</div>
  </div>


  <?= view('template_footer'); ?>
</body>
</html>
