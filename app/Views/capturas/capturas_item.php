<?= view('template_header'); ?>
<style>
    .tr-entidad {
        cursor: pointer;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Capturas de Ejecutoras</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm table-border">
                    <thead>
                        <tr>
                            <th>Entidad</th>
                            <th>Autorizadas</th>
                            <th>Licitaciones</th>
                            <th>Contratos</th>
                            <th>Programa</th>
                            <th>Avances</th>
                            <th>Estimaciones</th>

                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $item) : ?>
                            <tr class="tr-entidad" onclick="setEntidad(<?= $item->entidad ?>)">
                                <td><?= $item->entidad_nombre ?></td>
                                <td class="text-center"><?= $item->num ?></td>
                                <td class="text-center"><?= $item->num_licitacion ?></td>
                                <td class="text-center"><?= $item->num_contrato ?></td>
                                <td class="text-center"><?= $item->num_programa ?></td>
                                <td class="text-center">0/<?= $item->num_avances_prog ?></td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <!--td> <i style="color:red" class="fas fa-times fa-lg"></i>
                                </td-->
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?= view('template_footer'); ?>

<div class="modal fade" id="modal-entidad" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <dv class="col">
                            <div id="table-entidad"></div>

                        </dv>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function setEntidad(entidad) {
        console.log(entidad);
        var table_partidas = new Tabulator("#table-entidad", {
            //height: height,
            //rowContextMenu: rowMenu,
            ajaxURL: url_app + "capturas_entidad",
            ajaxConfig: "POST",
            ajaxParams: {
                entidad: entidad,
            },
            headerFilterPlaceholder: "",
            columnHeaderVertAlign: "bottom",
            tooltips: true,
            columns: [{
                title: "",
                field: "pip",
                width: 100,
                frozen: true,
                headerFilter: "input",
            }, {
                title: "Nombre",
                field: "nombre_completo",
                width: 400,
                frozen: true,
                headerFilter: "input",
            }, {
                title: "Licitado",
                field: "num_licitacion",
                width: 100,
                frozen: true,
                headerFilter: "input",
            }, {
                title: "Contratado",
                field: "num_contrato",
                width: 110,
                frozen: true,
                headerFilter: "input",
            }, {
                title: "Programa",
                field: "num_programa",
                width: 110,
                frozen: true,
                headerFilter: "input",
            },{
                title: "Avances",
                field: "num_avances_prog",
                width: 110,
                frozen: true,
                headerFilter: "input",
            }],
            dataChanged: function(data) {

            },
        });
        $("#modal-entidad").modal("show");
    }
</script>