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

</head>
<body>
  <style>
     body {
            font-family: 'Montserrat';
        }
        #botones{
          color: #fff;
    background-color: #590024;
    border-color: #590024;
    display: inline-block;
    font-weight: bold;
    border-radius:12px;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    /* background-color: transparent; */
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    box-shadow: none;
  }
  #botones2{
          color: #fff;
    background-color: #b5b5b5;
    border-color: #b5b5b5;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    /* background-color: transparent; */
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 10px;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    box-shadow: none;
  }
    .labeltitulo{
      text-align: center;
      justify-content: center;

    }
    h5{
      font-weight: bold;
      color: #fff;
    }
    .modal-title{
    text-align:center;
}
   .modal-header{
    background-color:#590024
   }
   #label{
    font-family: 'Montserrat';
    font-weight: 600px;
    text-align: center;
    color:#141b41;
   }
   input::file-selector-button {
   font-weight: bold;
   color: #590024;
   border: thin solid 590024;
   border-radius: 10px;
   background-color: #fff;
 }
 input[type=file].form-control{
   color:#141b41;
   margin: 10px;
 }

  </style>
  <script>
    $( document ).ready(function() {
    $('#exampleModal').modal('toggle')
});
    </script>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
<h5 class="modal-title mx-auto" id="exampleModalLabel">Documentación correspondiente del IMSS y el SAT </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="post" action="<?php echo base_url('FileUpload/upload');?>" enctype="multipart/form-data">
          <div class="form-group">
          <label id="label">Documento general pertenenciente al IMSS</label>
        <input type="file" name="imss" id="archivos" class="form-control" accept="application/pdf" >
          </div>
          <div class="form-group">
          <label id="label">Documento general pertenenciente al SAT</label>
        <input type="file" name="sat" class="form-control" accept="application/pdf" >
          </div>
            <div class="modal-footer">
                <button type="button"  id="botones2" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="botones">Enviar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>


<?= view('template_footer'); ?>
</body>
</html>
