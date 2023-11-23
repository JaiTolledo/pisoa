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
    body {
      font-family: 'Montserrat';
    }


    .botoncito {
      background-color: #590024;
      /* Green */
      border: none;
      color: white;
      padding: 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      font-weight: bold;
      border-radius: 10px;
    }


    .titulo-tabla {
      background-color: #141b41;
      text-align: center;
      margin-left: auto;
    }

    h5 {
      font-weight: 700px;
      font-size: 18px;
      color: #fff;
      padding: 16px
    }

    th {
      color: #2386ab;
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

    #nom-archivo {
      color: #000;
      font-weight: 600px;
      font-size: 14px;
    }

    td {
      color: #000;
      font-weight: 400px;
      font-size: 14px;
    }

    .botoncito {
      background-color: #2386a8;
      width: 120px;
      height: 32px;
      /* Green */
      border: none;
      color: white;
      padding: 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      font-weight: bold;
      border-radius: 10px;
    }

    .botoncito:hover,
    .botoncito:focus {
      background-color: #2386a8;
      color: #fff;
    }

    #custom-tabs-three-home-tab {
      color: #141b41;
      font-size: 16px;
      font-weight: 700px;
    }

    #tabs {
      background-color: #E3EAEE;
    }

    #tabs::after {
      background-color: #141b41;
      color: #fff;
    }

    #custom-tabs-one-tab .active,
    #custom-tabs-one-tab a:hover {
      font-weight: 600;
      font-size: 16px;
      outline: none;
      color: white;
      background-color: #2386a8;
      border-radius: 12px, 12px, 0px, 0px;
    }

    #custom-tabs-one-tab,
    #custom-tabs-one-tab a {
      font-weight: 600;
      font-size: 16px;
      outline: none;
      color: #2386a8;
      background-color: #E3EAEE;
      border-radius: 12px, 12px, 0px, 0px;
    }

    #custom-tabs-three-tab .active,
    #custom-tabs-three-tab a:hover {
      font-weight: 600;
      font-size: 16px;
      outline: none;
      color: white;
      background-color: #141b41;
      border-radius: 12px, 12px, 0px, 0px;
    }

    #custom-tabs-three-tab,
    #custom-tabs-three-tab a {
      font-weight: 600;
      font-size: 16px;
      outline: none;
      color: #141b41;
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
            <a class="nav-link" href="<?= base_url("inicio") ?>" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("documentos") ?>" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("ejecutora") ?>" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Ejecutora</a>
          </li>
          <li class="nav-item">

            <a id="menu" class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Secretaria</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">


            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Listado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Notificaciones</a>
              </li>
              <li class="nav-item dropdown" id="menu-notificaciones">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <?php foreach ($dato as $key => $l) :
                  ?>
                    <span class="badge badge-warning navbar-badge" id="total"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header"><?= $l->totalnotificaciones ?> notificaciones</span>
                <?php endforeach ?>
                <?php foreach ($datos as $key => $k) :
                  $id = $k->id_obra;
                ?>
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url("secretaria") ?>" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"> </i> <?= $k->descripcion ?>
                  </a>
                <?php endforeach ?>


                <div class="dropdown-divider"></div>
                <a href="<?= base_url("secretaria") ?>#custom-tabs-three-profile" class="dropdown-item dropdown-footer">Ver todas</a>
                </div>
              </li>
            </ul>

            <div>
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <div class="titulo-tabla">
                    <h5> Listados de documentos entregados </h5>

                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id obra</th>
                        <th>Nombre del archivo</th>
                        <th>Motivo</th>
                        <th>Generar oficio</th>
                      </tr>
                    </thead>
                    <?php foreach ($datas as $key => $m) :
                      $id = $m->id_documento;
                      $idn = $m->id_obra;
                    ?>

                      <tr>

                        <td><a> <?= $m->id_obra ?> </a></td>

                        <td><a id="nom-archivo" href="<?= base_url("descarga/$id") ?>" target="_blank"><?= $m->name ?> </a></td>
                        <td> <?= $m->descripcion ?> </td>
                        <td>
                          <a href="<?= base_url("oficio/$idn") ?>" class="botoncito" id="boton">Generar</a>
                        </td>


                      </tr>
                    <?php endforeach ?>
                  </table>
                </div>

                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <div class="titulo-tabla">
                    <h5> Listado de Notificaciones </h5>

                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id obra</th>
                        <th>Modulo</th>
                        <th>Descripción</th>
                        <th>Fecha y hora</th>
                      </tr>
                    </thead>
                    <?php foreach ($datos as $key => $k) :
                      $id = $k->id_obra;
                    ?>

                      <tr>

                        <td><a> <?= $k->id_obra ?> </a></td>

                        <td><a id="nom-archivo" href="<?= base_url("descarga/$id") ?>" target="_blank"><?= $k->nombre_modulo ?> </a></td>
                        <td> <?= $k->descripcion ?> </td>
                        <td>
                          <?= $k->fecha_hora_generado ?>
                        </td>


                      </tr>
                    <?php endforeach ?>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
<script>
  
    <?php foreach ($dato as $key => $z) :
                  ?>
                   <?php endforeach ?>

              var totaln=   <?= $z->totalnotificaciones ?>;
$.ajax({
     
  type: 'Get',
     url: '<?php echo base_url()."/secretaria"?>',
     data: { totaln}, 
     
     success:function(response){
        $('#total').text(totaln);
        
     }
  });

</script>
  <?= view('template_footer'); ?>

</body>

</html>