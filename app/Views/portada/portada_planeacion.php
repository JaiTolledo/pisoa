<?= view('template_header'); ?>
<style>
    .btn-filter {
        background-color: #00B5AF;
        color: #fff;
    }

    .btn-filter-select {
        background-color: #8C2784;
        color: #fff;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" id="btn-f" class="btn btn-default btn-sm"><i class="fas fa-filter"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!--a href="<?= base_url('obras/2023') ?>"><small class="badge badge-filter badge-<?= $filter_default == '' ? 'success' : 'light' ?>">sin filtros</small></a-->
                <?php foreach ($filters as $k => $ff) : ?>

                    <a href="<?= base_url('planeacion/' . $ff->name) ?>" class="btn   btn-<?= $filter_default == $ff->name ? 'filter-select' : 'filter' ?>" style="background-color:<?=$colors[$k]?>"><i class="fas fa-tag"></i> <?= $ff->name ?></a>


                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="grafica">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="tabla" class="mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-filter" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Filtrar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Filtros registrados</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <form id="form-filter">
                                            <div class="row mt-2 mb-2" style="border:3px solid #ccc;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Agrupar por</label>
                                                        <div class="input-group mb-3">
                                                            <select name="agrupacion" id="agrupacion" class="form-control">
                                                                <option value="">No agrupar</option>
                                                                <option value="secretaria_nombre">Por Secretaria</option>
                                                                <option value="entidad_nombre">Por Ejecutora</option>
                                                                <option value="eje_nombre">Por Ejes</option>
                                                                <option value="avance_semaforo">Por Semaforo</option>
                                                                <option value="cartera_nombre">Cartera</option>
                                                                <option value="vertiente_nombre">Vertiente</option>
                                                                <option value="referente_nombre">Referente</option>
                                                                <option value="compromiso_nombre">Por compromiso</option>
                                                                <option value="financiamiento_nombre">Financiamiento</option>
                                                                <option value="region">Región</option>
                                                                <option value="status_actual">Status actual</option>
                                                                <option value="contratista_razon">Contratista</option>
                                                                <option value="proyecto">¿Proyecto existente?</option>
                                                                <option value="proyecto_validado">¿Proyecto validado?</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">valor a mostrar</label>
                                                        <div class="input-group mb-3">
                                                            <select name="columna" id="columna" class="form-control">
                                                                <option value=""></option>
                                                                <option value="inversion_total">Inversión total</option>
                                                                <option value="importe_contratado">Importe contratado</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="region">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="region">Región</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0"></option>
                                                            <option value="valles centrales">Valles centrales</option>
                                                            <option value="costa">Costa</option>
                                                            <option value="sierra norte">Sierra Norte</option>
                                                            <option value="sierra sur">Sierra Sur</option>
                                                            <option value="cañada">Cañada</option>
                                                            <option value="mixteca">Mixteca</option>
                                                            <option value="istmo">Istmo</option>
                                                            <option value="papaloapan">Papaloapan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="cartera">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="">Cartera</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0">---</option>
                                                            <?php
                                                            foreach ($catalogo_carteras as $key => $item) {
                                                                echo '<option  value="' . $item->cartera_id . '"  >' . $item->cartera_nombre . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="financiamiento">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="">Financiamiento</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0">---</option>
                                                            <?php
                                                            foreach ($catalogo_financiamientos as $key => $item) {
                                                                echo '<option  value="' . $item->financiamiento_id . '"  >' . $item->financiamiento_nombre . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="compromiso">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="">Compromiso</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0">---</option>
                                                            <?php
                                                            foreach ($catalogo_compromisos as $key => $item) {
                                                                echo '<option  value="' . $item->compromiso_id . '"  >' . $item->compromiso_nombre . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="vertiente">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="">Vertiente</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0">---</option>
                                                            <?php
                                                            foreach ($catalogo_vertientes as $key => $item) {
                                                                echo '<option  value="' . $item->vertiente_id . '"  >' . $item->vertiente_nombre . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="referente">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="">Referente</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0">---</option>
                                                            <?php
                                                            foreach ($catalogo_referentes as $key => $item) {
                                                                echo '<option  value="' . $item->referente_id . '"  >' . $item->referente_nombre . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="inversion_total">
                                                    <div class="form-group">
                                                        <label for="">Inversión total</label>
                                                        <div class="input-group mb-3">
                                                            <select name="filter_comp[]">
                                                                <option value="=">=</option>
                                                                <option value="<"><?= htmlspecialchars('<') ?></option>
                                                                <option value="<="><?= htmlspecialchars('<=') ?></option>
                                                                <option value=">"><?= htmlspecialchars('>') ?></option>
                                                                <option value=">="><?= htmlspecialchars('>=') ?></option>
                                                            </select>
                                                            <input type="text" class="form-control" name="filter_val[]" placeholder="1000000">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="semaforo">
                                                    <input type="hidden" name="filter_comp[]" value="=">
                                                    <div class="form-group">
                                                        <label for="region">Semáforo</label>
                                                        <select name="filter_val[]" class="form-control">
                                                            <option value="0"></option>
                                                            <option value="verde">Terminadas</option>
                                                            <option value="azul">En proceso</option>
                                                            <option value="gris">Por iniciar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="filter_name[]" value="avance_fisico">
                                                    <div class="form-group">
                                                        <label for="">Avance Fisico(%)</label>
                                                        <div class="input-group mb-3">
                                                            <select name="filter_comp[]">
                                                                <option value="=">=</option>
                                                                <option value="<"><?= htmlspecialchars('<') ?></option>
                                                                <option value="<="><?= htmlspecialchars('<=') ?></option>
                                                                <option value=">"><?= htmlspecialchars('>') ?></option>
                                                                <option value=">="><?= htmlspecialchars('>=') ?></option>
                                                            </select>
                                                            <input type="text" class="form-control" name="filter_val[]" placeholder="10">
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="name-filter">Alias del filtro</label>
                                                    <input type="text" id="name-filter" class="form-control form-control-sm" placeholder="nombre del filtro">
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="descripcion-filter">Descripción</label>
                                                    <input type="text" id="descripcion-filter" class="form-control form-control-sm" placeholder="descripción del filtro">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-3 mb-1">
                                                    <button type="button" class="btn btn-info btn-sm" id="filtrar-guardar">Filtrar y Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($filters as $k => $ff) : ?>
                                                    <tr>
                                                        <td><?= $ff->name ?></td>
                                                        <td>

                                                            <button type="button" class="btn btn-link" onclick="eliminarFiltro(this,<?= $ff->id ?>)">Eliminar</button>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="table-data"></div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>



<?= view('template_footer'); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<link href="<?= base_url('public') ?>/tabulator/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('public') ?>/tabulator/js/tabulator.min.js"></script>
<script>
     var ejercicio = 2023;
    Highcharts.setOptions({
        colors: ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce',
            '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'
        ]
    });
   
    $("#btn-f").click(function() {
        $("#modal-filter").modal("show");
    });

    function getFormFilter() {
        var form = $("#form-filter").serializeArray();
        var object = {
            filter_normal: 1,
            ejercicio: ejercicio
        };
        var object2 = [{
            nombre: "ejercicio",
            comp: "=",
            valor: ejercicio
        }]
        $("[name='filter_name[]'").each(function(k, i) {
            var name = $("[name='filter_name[]'")[k].value;
            var comp = $("[name='filter_comp[]'")[k].value;
            var val = $("[name='filter_val[]'")[k].value;
            object[name] = val;

            object2.push({
                nombre: name,
                comp: comp,
                valor: val
            });
        });
        return {
            form1: object,
            form2: object2
        };
    }
    $("#filtrar").click(function() {
        filter_default = '';
        $("#modal-filter").modal("hide");
        //table.setData(url_app + "universoJSON", getFormFilter().form1);
    });

    $("#filtrar-guardar").click(function() {
        var name = $("#name-filter").val();
        var descripcion = $("#descripcion-filter").val();
        var agrupacion = $("#agrupacion").val();
        var columna = $("#columna").val();

        if (name == '') {
            $("#name-filter").css("border", "1px solid red");
            return false;
        }
        if (descripcion == '') {
            $("#descripcion-filter").css("border", "1px solid red");
            return false;
        }
        if (columna == '') {
            $("#columna").css("border", "1px solid red");
            return false;
        }

        var form = getFormFilter().form2;

        $.ajax({
            dataType: "JSON",
            type: "POST",
            data: {
                modulo: 'planeacion',
                descripcion: descripcion,
                agrupacion: agrupacion,
                columna: columna,
                name: name,
                form: JSON.stringify(form),
            },
            url: url_app + "set_filter_universo",
            success: function(r) {
                if (r.response) {
                    window.location.href = url_app + "planeacion/" + name;
                }
            }
        });

    });

    var data = JSON.parse('<?= json_encode($data["data"]) ?>');
    var names = JSON.parse('<?= json_encode($data["names"]) ?>');
    var descripcion = '<?= $detail_filter->descripcion ?>';
    var filter = '<?= $detail_filter->name ?>';
    var agrupar = '<?= $detail_filter->agrupar ?>';
    var columna = '<?= $detail_filter->columna ?>';

    Highcharts.chart('grafica', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'column',
            /*options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }*/
        },
        xAxis: {
            categories: names,
            crosshair: true,
            labels: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif',
                    color: '#000'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Inversión (MDP)'
            },
            labels: {
                enabled: false,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif',
                    color: '#000'
                }
            }
        },
        title: {
            text: descripcion,
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.2f} MDP',
                    style: {
                        fontSize: '8px',
                        fontFamily: 'Verdana, sans-serif',
                        color: '#000'
                    }
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            setTabla(agrupar, this.category,this.category);
                            //alert('Category: ' + tthis.caeogry + ', value: ' + this.y);
                        }
                    }
                }
            }
        },
        series: [{
            name: '',
            colorByPoint: true,
            data: data
        }]
    });
    var porcentajeCartera = function(value, data, cell, row, options) {
        var y = value.getData().y;
        var nums = parseFloat(<?= $data["total"] ?>);

        var por = (parseFloat(y) / parseFloat(nums)) * parseFloat(100);
        return numeral(por).format('0.00');
    }
    var ssum = function(value, data, cell, row, options) {
        return '';
    };

    /*var table = new Tabulator("#tabla", {
        data: data,
        columns: [{
                title: "",
                field: "name",
                width: "250",
                frozen: true,
            }, {
                title: "Obras",
                field: "obras",
                topCalc: "sum",
            },

            {
                title: "Total",
                field: "y",
                formatter: "money",
                topCalc: "sum",
            },
        ]
    });*/
    var redirectFormatter = function(value, data, cell, row, options) {
        var id_obra = value.getData().universo_id;
        return "<a href='" + url_app + 'item_ejecucion/' + id_obra + "'><i style='color:#000' class='fas fa-pen'></i></a>";
    };

    /*table.on("rowDblClick", function(e, row) {
        var row = row.getData();
        var value = row.name;
        setTabla(agrupar, value, 'CARTERA: ' + value);
    });*/

    function setTabla(name, value, title) {
        //var params = JSON.parse('{"filter_default":"'+filter+'","ejercicio": "' + ejercicio + '","' + name + '":"' + value + '"}');
        var params = JSON.parse('{"ejercicio": "' + ejercicio + '","' + name + '":"' + value + '"}');
        var table = new Tabulator("#table-data", {
            ajaxURL: url_app + "universoJSON",
            ajaxConfig: "POST",
            ajaxParams: params,
            headerFilterPlaceholder: "",
            columnHeaderVertAlign: "bottom",
            tooltips: true,
            height: 500,
            //groupBy: "supervisor",
            columns: [{
                    title: "",
                    field: "universo_id",
                    width: 20,
                    frozen: true,
                    hozAlign: "center",
                    formatter: redirectFormatter,
                },
                {
                    title: "Num",
                    field: "universo_id",
                    frozen: true,
                    hozAlign: "center",
                    topCalc: "count",
                    headerFilter: "input",
                    cellDblClick: function(e, cell) {
                        var row = cell.getRow();
                        var position = table.getRowPosition(row, true);
                        semaforoObra(cell.getData().id_obra);
                    }
                }, , {
                    title: "Nombre Completo",
                    field: "nombre_completo",
                    width: parseInt(250),
                    frozen: true,
                    headerFilter: "input",
                }, {
                    title: "PIP",
                    field: "pip",
                    width: 100,
                    hozAlign: "left",
                    headerFilter: "input",
                }, {
                    title: "Etapa",
                    field: "etapa",
                    width: 80,
                    hozAlign: "left",
                    headerFilter: "input",
                },
                {
                    title: "Ubicacion",
                    headerHozAlign: 'center',
                    columns: [{
                            title: "Región",
                            field: "region",
                            hozAlign: "left",
                            headerFilter: "input",
                        }, {
                            title: "Distrito",
                            field: "distrito",
                            hozAlign: "left",
                            headerFilter: "input",
                        }, {
                            title: "Municipio",
                            field: "municipio_alias",
                            hozAlign: "left",
                            headerFilter: "input",
                        }, {
                            title: "Localidad",
                            field: "localidad_alias",
                            hozAlign: "left",
                            headerFilter: "input",
                        },

                    ],
                }, {
                    title: "Cartera",
                    field: "cartera",
                    hozAlign: "left",
                    headerFilter: "input",

                }, {
                    title: "Inversión",
                    headerHozAlign: 'center',
                    columns: [{
                            title: "Federal",
                            field: "inversion_federal",
                            hozAlign: "center",
                            formatter: "money",
                            topCalc: "sum",
                            topCalcParams: {
                                precision: 2,
                            },
                            editor: "number"
                        }, {
                            title: "Estatal",
                            field: "inversion_estatal",
                            hozAlign: "center",
                            formatter: "money",
                            topCalc: "sum",
                            topCalcParams: {
                                precision: 2,
                            },
                            editor: "number"
                        }, {
                            title: "Total",
                            field: "inversion_total",
                            hozAlign: "center",
                            formatter: "money",
                            topCalc: "sum",
                            topCalcParams: {
                                precision: 2,
                            },
                            editor: "number"
                        },

                    ],
                }, {
                    title: "Fecha de ejecución proyectada",
                    headerHozAlign: 'center',
                    columns: [{
                        title: "Inicio",
                        field: "proyectado_inicio",
                        hozAlign: "center",
                    }, {
                        title: "Término",
                        field: "proyectado_termino",
                        hozAlign: "center",
                    }, ],
                }, {
                    title: "Clasificación",
                    headerHozAlign: 'center',
                    columns: [{
                        title: "Vertiente",
                        field: "vertiente_nombre",
                        hozAlign: "center",
                        width: 200,
                    }, {
                        title: "Referente",
                        field: "referente_nombre",
                        hozAlign: "center",
                        width: 200,
                    }, {
                        title: "Financiamiento",
                        field: "financiamiento_nombre",
                        hozAlign: "center",
                        width: 150,
                    }, ],
                }, {
                    title: "Licitación",
                    headerHozAlign: 'center',
                    columns: [{
                        title: "Num",
                        field: "licitacion_num",
                        hozAlign: "center",
                    }, ],
                }
            ],


        });
        $("#modal-data").modal("show");
        $("#modal-data").find(".modal-title").html(title);
    }

    function eliminarFiltro(elem, id) {
        $.ajax({
            dataType: "JSON",
            type: "POST",
            url: url_app + "delete_filter",
            data: {
                id: id
            },
            success: function() {
                location.reload();

            }
        });
        $(elem).parents("tr").remove();
    }
</script>