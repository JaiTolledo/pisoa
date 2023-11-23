<!doctype html>
<html lang="en">
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
  body {
            font-family: 'Montserrat';
        }
    .container{
        margin:10px;
    }
    .encabezados{
        text-align:right;
        font-family: 'Montserrat';
    }
    .texto{
        text-align:center;
        justify-content:justify;

    }
    table{
        margin: auto;
        border: black 1px solid;
    }
    td, th {
  border: black 1px solid;
}
    
    .despedida{
        text-align:center;
        justify-content:center;
    }
    
    body {
            font-family: 'Montserrat';
        }


    .botoncito{
      background-color: #590024; /* Green */
    border: none;
    color: white;
    padding:5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    border-radius:10px;
    }


    .titulo-tabla{
      background-color: #141b41;
      text-align: center;
      margin-left: auto;
    }
    h5{
      font-weight: 700px;
      font-size:18px;
      color: #fff;
      padding: 16px

    }
    th{
      color:#2386ab;
      font-weight: 700px;
      font-size:14px;
      text-align: center;
      background-color: #E3EAEE;
    }
    table tbody tr:nth-child(odd) {
  background: #f1F1F1;
}
table tbody tr:nth-child(even) {
	background: #FFF;
}
#nom-archivo{
  color:#000;
  font-weight: 600px;
  font-size: 14px;
}
td{
  color:#000;
  font-weight: 400px;
  font-size: 14px;
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
  background-color: #2386a8;
  color: #fff;
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

#custom-tabs-three-tab .active, #custom-tabs-three-tab a:hover {
    font-weight: 600;
    font-size: 16px;
    outline: none;
    color: white;
    background-color: #141b41;
    border-radius: 12px, 12px, 0px, 0px;
}
#custom-tabs-three-tab, #custom-tabs-three-tab a {
    font-weight: 600;
    font-size: 16px;
    outline: none;
    color:  #141b41;
    background-color: #E3EAEE;
    border-radius: 12px, 12px, 0px, 0px;
}
    </style>
</head>
<body>
<div class="container">

<div class="encabezados">
    <p>TLALIXTAC DE CABRERA, OAX., 08 AGOSTO 2023</p>
    <p>OFICIO NÚMERO: <b>PL-FQ2-SHTFP/(No. ID DEPENDEN)/0001-23</b></p>
    <p>ASUNTO: NOTIFICACION DE OPINION DEL SAT-IMSS</p>
</div>
<div class="destinatario">
    <p><b>C. PEDRO PABLO JUAN PEREZ</b></p>
    <p>CARGO EN LA DEPENDENCIA DEPENDENCIA A LA QUE VA DIRIGIDO</p>
    <p>P R E S E N T E</p>
</div>
<br><br>
<div class="texto">
    <p>
    Por medio de la presente TARJETA INFORMATIVA le informo acerca de las 
inconsistencias observadas en la siguiente documentación:
    </p>
</div>
<table class="table">
    <thead>
           <tr>
            <th>Item</th>
            <th>Nombre de la obra</th>
            <th>Documento (organismo)</th>
            <th>Opinion del organismo</th>
            <th>Descripción</th>

            </tr>     
    </thead>
    <tbody>
    <?php foreach ($data as $key => $m):
     ?>
        <tr>
            <td>1</td>
            <td><?=$m->id_obra?> </td>
            <td><?=$m->tipo_documento?> </td>
            <td>
                NEGATIVA
            </td>  
            <td><?=$m->descripcion?> </td>
              </tr>
              <?php endforeach?>
    </tbody>
</table>
<div class="texto">
    <p>
    Esperando contar con su atención correspondiente, para que la documentación
quede totalmente solventada y sin otro particular, le envío un cordial 
saludo.
    </p>
</div>
<br><br>
<div class="despedida">
    <p>ATENTAMENTE</p>
    <br>
    <p><b>L.C.P. Leticia Elsa Reyes López</b></p>
    <p><b>SECRETARIA DE HONESTIDAD, TRANSPARENCIA Y FUNCION PÚBLICA</b></p>
</div>
</div>

</body>
</html>