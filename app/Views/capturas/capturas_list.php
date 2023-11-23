<?= view('template_header'); ?>
<style>

</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h5 class="title-grafica">
                            <!--i class="fas fa-chart-bar mr-1"></i-->
                            CAPTURAS POR EJECUTORA
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <ul class="pagination pagination-month justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <?php foreach ($datos as $key => $m) :
                                        $num_semana = $m->semana;
                                        // print_r($num_semana);
                                        $fecha_inicio = date("Y-m-d", strtotime($m->fecha_inicio));
                                        $fecha_fin = date("Y-m-d", strtotime($m->fecha_fin));
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" id="texto" href="<?= base_url("semanas/$num_semana") ?>">
                                                <p class="page-month" id="texto"> <?= mes_min($m->mes) ?></p>
                                                <p class="page-year" id="texto"><?= formato_fecha($fecha_inicio, 4) ?> al <?= formato_fecha($fecha_fin, 4) ?></p>

                                            </a>
                                        </li>
                                    <?php endforeach ?>

                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                       

                        <div class="row">
                            <div class="col">
                                <div id="capturas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="bi bi-file-pdf" href="<?= base_url('AvanceSemana/generatePDF') ?>">Generar PDF</a>
        <br>
    </div>
</div>
<?= view('template_footer'); ?>
<script>
    var semana = parseInt(<?= $semana ?>);
    var table = new Tabulator("#capturas", {
        ajaxURL: url_app + "capturas_json",
        ajaxConfig: "POST",
        ajaxParams: {
            semana: semana
        },
        headerFilterPlaceholder: "",
        columnHeaderVertAlign: "bottom",
        tooltips: true,
        height: 500,
        groupBy: "entidad_nombre",
        columns: [{
                title: "",
                field: "universo_id",
                width: 20,
                frozen: true,
                hozAlign: "center",
                formatter: redirectFormatter,
            }, , {
                title: "Obra/Acción",
                field: "nombre_completo",
                cssClass: "blue-background",
                width: parseInt(250),
                frozen: true,
                headerFilter: "input",
            }, {
                title: "Datos generales",
                field: "datos_generales",
                width: 180,
                hozAlign: "center",
                headerFilter: "input",
            }, {
                title: "Licitación",
                field: "licitacion",
                width: 120,
                hozAlign: "center",
                headerFilter: "input",
            }, {
                title: "Contrato",
                field: "contrato",
                width: 120,
                hozAlign: "center",
                headerFilter: "input",
            }, {
                title: "Partidas",
                field: "partidas",
                width: 120,
                hozAlign: "center",
                headerFilter: "input",
            },
            {
                title: "Avances",
                headerHozAlign: 'center',
                columns: [{
                        title: "Num. Avances programados",
                        field: "num_avances",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Enviados",
                        field: "enviados_avance",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Revisados",
                        field: "revisados_avance",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Observados",
                        field: "observados_avance",
                        hozAlign: "left",
                        headerFilter: "input",
                    },

                ],
            }, {
                title: "Expediente",
                headerHozAlign: 'center',
                columns: [{
                        title: "Documentos",
                        field: "num_documentos",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Enviados",
                        field: "enviados_expediente",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Revisados",
                        field: "revisados_expediente",
                        hozAlign: "left",
                        headerFilter: "input",
                    }, {
                        title: "Observados",
                        field: "observados_expediente",
                        hozAlign: "left",
                        headerFilter: "input",
                    },

                ],
            },
        ],


    });
</script>