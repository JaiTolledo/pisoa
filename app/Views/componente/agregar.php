<?= view('template_header'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat");

    body {
        font-family: 'Montserrat';
    }

    #botones {
        color: #fff;
        background-color: #590024;
        border-color: #590024;
        display: inline-block;
        font-weight: bold;
        border-radius: 12px;
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
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        box-shadow: none;
    }

    #botones2 {
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
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        box-shadow: none;
    }

    .labeltitulo {
        text-align: center;
        justify-content: center;

    }

    h5 {
        text-align: center !important;
        font-weight: bold;
        color: #fff;
    }

    .modal-title {
        text-align: center;
    }

    .modal-header {
        background-color: #590024
    }

    #label {
        font-family: 'Montserrat';
        font-weight: 600px;
        text-align: center;
        color: #141b41;
    }

    input::file-selector-button {
        font-weight: bold;
        color: #590024;
        border: thin solid 590024;
        border-radius: 10px;
        background-color: #fff;
    }

    input[type=file].form-control {
        color: #141b41;
        margin: 10px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#exampleModal').modal('toggle')
    });
</script>

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
    <div class="container">
    
<table class="table">
    <thead>
    <tr>
            <th style="text-align: center;">Id</th>
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center;">Monto</th>
            <th style="text-align: center;">Opciones </th>
        
        </tr>
    </thead>
    
        <tr>
            <td style="text-align: center;">  </td>
            <td style="text-align: center;">  </td>
            <td style="text-align: center;">  </td>
            <td style="text-align: center;">  </td>

        </tr>
    
</table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="exampleModalLabel">REGISTRAR COMPONENTE </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('componente/agregado'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label id="label">Clave del componente</label>
                        <input type="text" name="componente_clave" id="componente_clave" class="form-control" accept="application/pdf">
                    </div>
                    <div class="form-group">
                        <label id="label">Nombre del componente</label>
                        <input type="text" name="componente_nombre" id="componente_nombre" class="form-control" accept="application/pdf">
                    </div>
                    <div class="form-group">
                        <label id="label">Monto ($)</label>
                        <input type="number" name="componente_monto" id="componente_monto" class="form-control" accept="application/pdf">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="botones2" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="botones">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




<?= view('template_footer'); ?>