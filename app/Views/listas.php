<!doctype html>
<html lang="en">
<?= view('template_header'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Documentos IMSS SAT</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <style>
    .container {
      max-width: 500px;
    }
    body {
            font-family: 'Montserrat';
        }

    .botonilegible{
    background-color: #2386A8; /* Green */
    border: none;
    color: white;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: 700px;
    border-radius:10px;
    }
    .botonincorrecto{
    background-color: #8c2784; /* Green */
    border: none;
    color: white;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: 700px;
    border-radius:10px;
    }
    .botoncorrecto{
    background-color: #59b038; /* Green */
    border: none;
    color: white;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: 700px;
    border-radius:10px;
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
      font-size:18px;
      background-color: #E3EAEE;
    }
    #nom-archivo{
      color:#000;
      font-weight: 500px;
      font-size: 18px;
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
    <a id="menu" class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="<?=base_url("documentos")?>" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Documentos</a>

  </li>
  <li class="nav-item">
  <a class="nav-link"  href="<?=base_url("ejecutora")?>" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Ejecutora</a>
  </li>
  <li class="nav-item">

    <a class="nav-link"  href="<?=base_url("secretaria")?>" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Secretaria</a>
  </li>
  </ul>
  </div>

  <div  id="columna">
    <div class="titulo-tabla">
  <h5> Listados de documentos entregados </h5>
    </div>


    <table class="table">
      <thead>
        <tr>
        <th>Nombre</th>
          <th></th>
          <th></th>
          <th ></th>
        </tr>
        </thead>
            <?php foreach ($data as $key => $m) :
              $id=$m->id_documento;
              ?>

          <tr>

          <td><a id="nom-archivo" href="<?= base_url("descarga/$id") ?>" target="_blank" > <?= $m->name ?>  </a></td>

                                        <td width="25px"><a href=" <?= base_url("revision2/$id") ?>" class="botonilegible"> Ilegible </a></td>
                                        <td width="25px"><a href=" <?= base_url("revision1/$id") ?>" class="botoncorrecto"> Correcto </a></td>
                                        <td width="25px">
                                        <button  class="botonincorrecto" id="boton" data-toggle="modal" data-target="#observacionModal" >Incorrecto</button>
                                        </td>


                                      </tr>
                                      <?php endforeach ?>
                                </table>

        </div>


</div>
  </div>


  <div class="modal fade" id="observacionModal" tabindex="-1" role="dialog" aria-labelledby="observacionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="labeltitulo">
<h5 class="modal-title" id="exampleModalLabel">Observaciones del documento</h5>
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php foreach ($data as $key => $m) :
              $id=$m->id_documento;
              ?>

        <form  method="post" action="<?php echo base_url("revision3/$id");?>" enctype="multipart/form-data">
        <?php endforeach ?>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Observaciones:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="botones" name="botones"  class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>

    </div>
  </div>
</div>

</div>
</div>
<?= view('template_footer'); ?>
</body>
</html>
