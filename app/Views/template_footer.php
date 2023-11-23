</div>



</div>


<div class="modal fade" id="modal-edit-filter" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="container-filter">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-avances" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
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
                    <div class="row">
                        <div class="col" id="cont-avances"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-data" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="container-data">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-revocar-registro" tabindex="-1" aria-labelledby="modal-columns" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="form-revocar-registro">
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
                            <div class="col">
                                <div class="form-group">
                                    <label for="observaciones_revocar">Observaciones de revocación</label>
                                    <textarea name="observaciones_revocar" id="observaciones_revocar" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-paper-plane"></i> Revocar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('public/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('public/numeral/numeral.min.js') ?>"></script>

<link href="<?= base_url('public') ?>/tabulator/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('public') ?>/tabulator/js/tabulator.min.js"></script>


<script>
    var url_app = "<?= base_url() ?>";
</script>